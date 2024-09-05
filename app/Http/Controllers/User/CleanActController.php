<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;

class CleanActController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['store']);
    }

    public function index()
    {
        $campaigns = Campaign::where('is_approved', true)
            ->where('due_date_volunteer', '!=', null)
            ->when(request('keyword'), function ($query) {
                return $query->where('title', 'like', '%'.request('keyword').'%');
            })
            ->with(['city.province'])
            ->withCount('volunteers')
            ->orderBy('due_date_volunteer', 'ASC')
            ->paginate(request('per_page', 9));

        return view('pages.user.cleanact.index', compact('campaigns'));
    }
}
