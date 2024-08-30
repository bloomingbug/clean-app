<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campaign;
use Illuminate\Http\Request;

class CleanActController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:campaign.act')->only('edit', 'update');
    }

    public function edit(Campaign $campaign)
    {
        return view('pages.admin.cleanact.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign)
    {
        $request->validate([
            'target_volunteer' => ['required', 'numeric'],
            'due_date_volunteer' => ['required', 'date'],
        ]);

        $campaign->update([
            'target_volunteer' => $request->target_volunteer,
            'due_date_volunteer' => $request->due_date_volunteer,
        ]);

        flash()->success('Data berhasil diupdate');
        return redirect()->route('admin.campaign.index')->with('success', 'Data berhasil diupdate');
    }
}
