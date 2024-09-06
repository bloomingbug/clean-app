<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use App\Models\Funding;
use App\Models\Province;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class CleanUpController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['create', 'store', 'vote']);
    }

    public function index(Request $request)
    {
        if ($request->wantsJson()) {
            $campaigns = Campaign::with(['city.province', 'votes'])
                ->whereNot('is_approved', 1)->orWhere('is_approved', null)
                ->orderBy('vote', 'DESC')
                ->orderBy('title', 'ASC')
                ->get();

            return DataTables::of($campaigns)
                ->addIndexColumn()
                ->addColumn('cityAndProvince', function (Campaign $campaign) {
                    return $campaign->city->name . ', ' . $campaign->city->province->name;
                })
                ->addColumn('vote', function (Campaign $campaign) {
                    if (auth()->check()) {
                        if ($campaign->votes->contains('user_id', auth()->user()->id)) {
                            return '<button class="btn btn-primary btn-sm" onClick="handleVote(\'' . $campaign->slug . '\')" >Vote</button>';
                        } else {
                            return '<button class="btn btn-outline-primary btn-sm" onClick="handleVote(\'' . $campaign->slug . '\')" >Vote</button>';
                        }
                    }

                    return '<button class="btn btn-outline-primary btn-sm" onClick="handleVote(\'' . $campaign->slug . '\')" >Vote</button>';
                })
                ->rawColumns(['vote'])
                ->make(true);
        }

        return view('pages.user.cleanup.index');
    }

    public function create()
    {
        $provinces = Province::select(['id', 'name'])->get();

        return view('pages.user.cleanup.create', compact('provinces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'cover' => ['required', 'image', 'max:2048'],
            'location' => ['required', 'regex:/^-?\d+(\.\d+)?,\s?-?\d+(\.\d+)?$/'],
            'city_id' => ['required', 'exists:cities,id'],
            'address' => ['required', 'string'],
        ]);

        $file = $request->file('cover');
        $fileName = date('YmdHis') . '-campaign-' . Str::slug(strtoupper($request->title)) . '.' . $file->getClientOriginalExtension();
        $file->storeAs('/public/media', $fileName);

        $slug = generateSlug(Campaign::class, $request->title, 'slug');
        $getLatLong = explode(',', $request->location);

        Campaign::create([
            'title' => $request->title,
            'slug' => $slug,
            'latitude' => trim($getLatLong[0]),
            'longitude' => trim($getLatLong[1]),
            'cover' => $fileName,
            'description' => $request->description,
            'city_id' => $request->city_id,
            'address' => $request->address,
            'proposed_by_id' => auth()->user()->id,
        ]);

        flash()->success('Campaign berhasil ditambahkan');

        return redirect()->route('home');
    }

    public function show(Campaign $campaign)
    {
        $campaign->load(['city.province', 'proposedBy'])->loadCount('volunteers');
        $fundings = Funding::select(['no', 'name', 'amount', 'is_anonymous', 'message', 'created_at'])
            ->where('campaign_id', $campaign->id)
            ->where('status', 'success')
            ->latest()
            ->limit(10)
            ->get();
        $ticket = Volunteer::where('campaign_id', $campaign->id)->where('user_id', auth()->id())->first();

        return view('pages.user.cleanup.show', compact('campaign', 'fundings', 'ticket'));
    }

    public function location()
    {
        $campaigns = Campaign::select(['title', 'slug', 'cover', 'description', 'latitude', 'longitude', 'address', 'city_id', 'proposed_by_id', 'is_approved'])
            ->whereNot('is_approved', 1)->orWhere('is_approved', null)
            ->with(['city.province', 'proposedBy'])
            ->get();

        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $campaigns,
        ], 200);
    }

    public function vote($campaign)
    {
        try {
            DB::beginTransaction();

            $campaign = Campaign::where('slug', $campaign)->first();
            if (! $campaign) {
                return response()->json([
                    'success' => false,
                    'status' => 404,
                    'message' => 'Campaign tidak ditemukan',
                ], 404);
            }

            $vote = $campaign->votes()->where('user_id', auth()->user()->id)->first();

            if ($vote) {
                $campaign->update([
                    'vote' => $campaign->vote - 1,
                ]);
                $vote->delete();
            } else {
                $campaign->update([
                    'vote' => $campaign->vote + 1,
                ]);
                $campaign->votes()->create([
                    'name' => auth()->user()->name,
                    'user_id' => auth()->user()->id,
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'status' => 200,
                'message' => 'Berhasil vote campaign',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'status' => 500,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
