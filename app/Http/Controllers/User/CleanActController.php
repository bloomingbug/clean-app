<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CleanActController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['store']);
    }

    public function index()
    {
        $campaigns = Campaign::where('due_date_volunteer', '!=', null)
            ->when(request('keyword'), function ($query) {
                return $query->where('title', 'like', '%' . request('keyword') . '%');
            })
            ->with(['city.province'])
            ->withCount('volunteers')
            ->orderBy('due_date_volunteer', 'ASC')
            ->paginate(request('per_page', 9));


        return view('pages.user.cleanact.index', compact('campaigns'));
    }
}
