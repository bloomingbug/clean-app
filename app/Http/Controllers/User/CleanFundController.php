<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Funding;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Midtrans\Snap;

class CleanFundController extends Controller
{
    public function __construct()
    {
        \Midtrans\Config::$serverKey = config('services.midtrans.serverKey');
        \Midtrans\Config::$isProduction = config('services.midtrans.isProduction');
        \Midtrans\Config::$isSanitized = config('services.midtrans.isSanitized');
        \Midtrans\Config::$is3ds = config('services.midtrans.is3ds');

        $this->middleware('auth')->only(['store']);
    }

    public function index()
    {
        $campaigns = Campaign::where('is_approved', true)
            ->when(request('keyword'), function ($query) {
                return $query->where('title', 'like', '%' . request('keyword') . '%');
            })
            ->where('due_date_fund', '>=', date('Y-m-d'))
            ->with(['city.province'])
            ->orderBy('approved_at', 'ASC')
            ->paginate(request('per_page', 9));

        return view('pages.user.cleanfund.index', compact('campaigns'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => ['required', 'exists:campaigns,slug'],
            'amount' => ['required', 'numeric', 'min:5000'],
            'message' => ['sometimes', 'nullable', 'string'],
            'is_anonymous' => ['sometimes', 'nullable', 'boolean'],
        ]);

        try {
            DB::beginTransaction();
            $campaign = Campaign::where('slug', $request->slug)->first();
            if (! $campaign) {
                return redirect()->back()->withInput()->withErrors(['slug' => 'Campaign not found']);
            }

            if ($campaign->due_date_fund < date('Y-m-d')) {
                return redirect()->back()->withInput()->withErrors(['slug' => 'Campaign funding has closed']);
            }

            $user = auth()->user();

            $random = '';
            for ($i = 0; $i < 10; $i++) {
                $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
            }

            $no = formatInitials($campaign->title) . '-CF-' . date('d') . strtoupper($random);

            $donation = Funding::create([
                'no' => $no,
                'name' => $user->name,
                'email' => $user->email,
                'amount' => $request->amount,
                'is_anonymous' => $request->is_anonymous ?? 0,
                'message' => $request->message,
                'campaign_id' => $campaign->id,
                'donatur_id' => $user->id,
                'status' => 'pending',
            ]);

            $payload = [
                'transaction_details' => [
                    'order_id' => $donation->no,
                    'gross_amount' => $donation->amount,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ],
            ];

            // $snapToken = Snap::getSnapToken($payload);
            $paymentUrl = \Midtrans\Snap::createTransaction($payload)->redirect_url;
            $donation->snap_token = $paymentUrl;
            $donation->save();

            DB::commit();

            return redirect($paymentUrl);
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->withInput()
                ->withErrors(['slug' => 'Donation failed to create']);
        }
    }

    public function update(Request $request)
    {
        $payload = $request->getContent();
        $notification = json_decode($payload);

        $validSignatureKey = hash('sha512', $notification->order_id . $notification->status_code . $notification->gross_amount . config('services.midtrans.serverKey'));

        if ($notification->signature_key != $validSignatureKey) {
            return response(['message' => 'Invalid signature'], 403);
        }

        $transaction = $notification->transaction_status;
        $type = $notification->payment_type;
        $orderId = $notification->order_id;
        $fraud = $notification->fraud_status;

        try {
            DB::beginTransaction();
            $data_donation = Funding::where('no', $orderId)->first();
            if (! $data_donation) {
                return response(['message' => 'Donation not found'], 404);
            }

            if ($transaction == 'capture') {
                if ($type == 'credit_card') {
                    if ($fraud == 'challenge') {
                        $data_donation->update([
                            'status' => 'pending',
                        ]);
                    } else {
                        $data_donation->update([
                            'status' => 'success',
                        ]);
                    }
                }
            } elseif ($transaction == 'settlement') {
                $data_donation->update([
                    'status' => 'success',
                ]);
            } elseif ($transaction == 'pending') {
                $data_donation->update([
                    'status' => 'pending',
                ]);
            } elseif ($transaction == 'deny') {
                $data_donation->update([
                    'status' => 'failed',
                ]);
            } elseif ($transaction == 'expire') {
                $data_donation->update([
                    'status' => 'expired',
                ]);
            } elseif ($transaction == 'cancel') {
                $data_donation->update([
                    'status' => 'failed',
                ]);
            }

            if ($data_donation->status == 'success') {
                $campaign = $data_donation->campaign()->lockForUpdate()->first();

                $campaign->update([
                    'total_fund' => $campaign->total_fund + $data_donation->amount,
                ]);
            }

            DB::commit();

            return response(['message' => 'Donation updated successfully'], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response(['message' => 'Failed to update donation'], 500);
        }
    }
}
