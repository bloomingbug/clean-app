<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:campaign.index')->only('index');
        $this->middleware('permission:campaign.edit')->only('edit', 'update');
        $this->middleware('permission:campaign.delete')->only('destroy');
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $campaigns = Campaign::with(['city.province', 'proposedBy'])
                ->latest()
                ->get();

            return DataTables::of($campaigns)
                ->addIndexColumn()
                ->addColumn('desc', function (Campaign $campaign) {
                    return Str::limit($campaign->description, 50);
                })
                ->addColumn('proposed', function (Campaign $campaign) {
                    return $campaign->proposedBy->name;
                })
                ->addColumn('location', function (Campaign $campaign) {
                    return $campaign->city->name.', '.$campaign->city->province->name;
                })
                ->addColumn('date', function (Campaign $campaign) {
                    return $campaign->created_at->format('d F Y');
                })
                ->addColumn('action', function (Campaign $campaign) {
                    return view('pages.admin.campaign.button.crud', compact('campaign'));
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $title = 'Hapus Campaign!';
        $text = 'Apakah anda yakin ingin menghapus campaign ini?';
        confirmDelete($title, $text);

        return view('pages.admin.campaign.index');
    }

    public function approve(Campaign $campaign)
    {
        $campaign->update([
            'is_approved' => ! $campaign->is_approved,
            'approved_by' => auth()->id(),
            'approved_at' => now(),
        ]);

        return response()->json([
            'success' => true,
            'status' => 200,
            'message' => 'Campaign berhasil diapprove',
        ]);
    }

    public function edit(Campaign $campaign)
    {
        return view('pages.admin.campaign.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cover' => ['sometimes', 'nullable', 'image', 'max:2048'],
            'location' => ['required', 'regex:/^-?\d+(\.\d+)?,\s?-?\d+(\.\d+)?$/'],
            'event_date' => ['sometimes', 'nullable', 'date'],
            'event_time' => ['sometimes', 'nullable', 'date_format:H:i'],
        ]);

        $fileName = $campaign->getRawOriginal('cover');
        if ($request->hasFile('cover')) {
            if ($campaign->getRawOriginal('cover') != null) {
                Storage::disk('local')->delete('/public/media/'.$campaign->getRawOriginal('cover'));
            }

            $file = $request->file('cover');
            $fileName = date('YmdHis').'-campaign-'.Str::slug(strtoupper($request->title)).'.'.$file->getClientOriginalExtension();
            $file->storeAs('/public/media', $fileName);
        }

        $getLatLong = explode(',', $request->location);

        $campaign->update([
            'title' => $request->title,
            'description' => $request->description,
            'cover' => $fileName,
            'latitude' => trim($getLatLong[0]),
            'longitude' => trim($getLatLong[1]),
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,

        ]);

        flash()->success('Campaign berhasil diupdate');

        return redirect()->route('admin.campaign.index')->with('success', 'Campaign berhasil diupdate');
    }

    public function destroy(Campaign $campaign)
    {
        $campaign->delete();

        flash()->success('Campaign berhasil dihapus');

        return redirect()->back()->with('success', 'Campaign berhasil dihapus');
    }
}
