<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Funding;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProfileFundController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        if ($request->wantsJson()) {
            $fundings = Funding::with('campaign')->where('donatur_id', auth()->id())->latest()->get();

            return DataTables::of($fundings)
                ->addIndexColumn()
                ->addColumn('date', function ($donation) {
                    return ($donation->campaign->event_date ? $donation->campaign->event_date->format('d F Y')  : '') . ' ' . ($donation->campaign->event_time ? $donation->campaign->event_time->format('H:i') : '');
                })
                ->addColumn('campaign', function ($donation) {
                    return $donation->campaign->title;
                })
                ->editColumn('amount', function ($donation) {
                    return 'Rp ' . number_format($donation->amount, 0, ',', '.');
                })
                ->addColumn('status', function ($donation) {
                    return strtoupper($donation->status);
                })
                ->addColumn('action', function ($donation) {
                    $buttons = '<div class="d-flex flex-nowrap justify-content-center align-items-center gap-2">';
                    $buttons .= '<a href="' . route('cleanup.show', $donation->campaign->slug) . '" class="btn btn-sm btn-info">Detail</a>';

                    if ($donation->status == 'pending') {
                        $buttons .= '<a href="' . $donation->snap_token . '" target="_blank" class="btn btn-sm btn-primary">Bayar</a>';
                    }

                    $buttons .= '</div>';
                    return $buttons;
                })
                ->rawColumns(['action'])
                ->make(true);
        } else {
            return view('pages.user.profile.fund');
        }
    }
}
