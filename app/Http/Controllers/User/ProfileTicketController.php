<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ProfileTicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request)
    {
        if ($request->wantsJson()) {
            $tickets = Volunteer::with('campaign.city.province')->where('user_id', auth()->id())->latest()->get();

            return DataTables::of($tickets)
                ->addIndexColumn()
                ->addColumn('campaign', function ($ticket) {
                    return $ticket->campaign->title;
                })
                ->addColumn('date', function ($ticket) {
                    return ($ticket->campaign->event_date ? $ticket->campaign->event_date->format('d F Y')  : '') . ' ' . ($ticket->campaign->event_time ? $ticket->campaign->event_time->format('H:i') : '');
                })
                ->addColumn('location', function ($ticket) {
                    return '<a href="https://www.google.com/maps/@' . $ticket->campaign->latitude . ',' . $ticket->campaign->longitude . ',16z" target="_blank" class="text-link">' . $ticket->campaign->city->name . ', ' . $ticket->campaign->city->province->name . '</a>';
                })
                ->addColumn('action', function ($ticket) {
                    return '<a href="' . route('cleanact.show', $ticket->no) . '" class="btn btn-sm btn-primary">Detail</a>';
                })
                ->rawColumns(['location', 'action'])
                ->make(true);
        } else {
            return view('pages.user.profile.ticket');
        }
    }
}
