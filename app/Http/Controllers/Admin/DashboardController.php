<?php

namespace App\Http\Controllers\Admin;

use App\Enum\RolesEnum;
use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        $campaignNeedApproval = Campaign::where('is_approved', null)->count();
        $campaignNeedFund = Campaign::where('is_approved', 1)->where('target_fund', null)->count();
        $campaignNeedVolunteer = Campaign::where('is_approved', 1)->where('target_volunteer', null)->count();

        $newestCampaigns = Campaign::with(['city.province', 'proposedBy'])->latest()->take(10)->get();

        return view('pages.admin.dashboard.index', compact('campaignNeedApproval', 'campaignNeedFund', 'campaignNeedVolunteer', 'newestCampaigns'));
    }
}
