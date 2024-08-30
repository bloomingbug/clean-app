<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CleanFundController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:campaign.fund')->only('edit', 'update');
    }

    public function edit(Campaign $campaign)
    {
        return view('pages.admin.cleanfund.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'target_fund' => ['required', 'numeric'],
            'due_date_fund' => ['required', 'date'],
        ]);

        $campaign->update([
            'target_fund' => $request->target_fund,
            'due_date_fund' => $request->due_date_fund,
        ]);

        flash()->success('Data berhasil diupdate');
        return redirect()->route('admin.campaign.index')->with('success', 'Data berhasil diupdate');
    }
}
