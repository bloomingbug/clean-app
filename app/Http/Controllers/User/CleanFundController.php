<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CleanFundController extends Controller
{
    public function __construct()
    {
        // $this->middleware('auth')->only(['store']);
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
}
