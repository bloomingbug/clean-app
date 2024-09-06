<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CleanActController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'show', 'update']);
    }

    public function index()
    {
        $campaigns = Campaign::where('is_approved', true)
            ->where('due_date_volunteer', '!=', null)
            ->when(request('keyword'), function ($query) {
                return $query->where('title', 'like', '%' . request('keyword') . '%');
            })
            ->with(['city.province'])
            ->withCount('volunteers')
            ->orderBy('due_date_volunteer', 'ASC')
            ->paginate(request('per_page', 9));

        return view('pages.user.cleanact.index', compact('campaigns'));
    }

    public function create(Campaign $campaign)
    {
        return view('pages.user.cleanact.create', compact('campaign'));
    }

    public function store(Campaign $campaign, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'string'],
        ]);

        $isRegistered = $campaign->volunteers()->where('user_id', auth()->id())->exists();
        if ($isRegistered) {
            flash()->error('Anda sudah terdaftar');

            return redirect()->back()->with('error', 'Anda sudah terdaftar');
        }

        $random = '';
        for ($i = 0; $i < 10; $i++) {
            $random .= rand(0, 1) ? rand(0, 9) : chr(rand(ord('a'), ord('z')));
        }

        $no = formatInitials($campaign->title) . '-CA-' . date('d') . strtoupper($random);

        $campaign->volunteers()->create([
            'no' => $no,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'user_id' => auth()->id(),
            'campaign_id' => $campaign->id,
        ]);

        flash()->success('Pendafataran berhasil');

        return redirect()->back()->with('success', 'Pendafataran berhasil');
    }

    public function show(Volunteer $volunteer)
    {
        $volunteer->load(['campaign.city.province', 'user']);

        return view('pages.user.cleanact.show', compact('volunteer'));
    }

    public function update(Volunteer $volunteer, Request $request)
    {
        $request->validate([
            'presence_evidence' => ['required', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        if ($volunteer->campaign->due_date_volunteer->isFuture()) {
            flash()->error('Anda tidak bisa mengunggah bukti kehadiran sebelum hari H');
            return redirect()->back()->with('error', 'Anda tidak bisa mengunggah bukti kehadiran sebelum hari H');
        }

        if ($volunteer->campaign->due_date_volunteer->isPast()) {
            flash()->error('Anda tidak bisa mengunggah bukti kehadiran setelah hari H');
            return redirect()->back()->with('error', 'Anda tidak bisa mengunggah bukti kehadiran setelah hari H');
        }

        $file = $request->file('presence_evidence');
        $fileName = date('YmdHis') . '-presence-' . Str::slug(strtoupper(auth()->user()->name)) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/public/presence', $fileName);

        $volunteer->update([
            'presence_evidence' => $fileName,
        ]);

        flash()->success('Bukti kehadiran berhasil diunggah');
        return redirect()->back()->with('success', 'Bukti kehadiran berhasil diunggah');
    }
}
