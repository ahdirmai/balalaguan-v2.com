<?php

namespace App\Http\Controllers;

use App\Models\Period;
use App\Models\Phase;
use App\Models\Ticket;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $phases = Phase::all();
        $periods = [];
        $stock = 0;
        foreach ($phases as $key => $ph) {
            $periods[] = Period::where('phase_id', $ph->id)->with('category', 'phase')->get();
        }

        $tickets = Ticket::all();
        $tickets_sold = $tickets->count();
        $dateToday = date_format(new DateTime('now'), 'Y-m-d');
        $tickets_sold_today = $tickets->where('created_at', '==', $dateToday)->count();
        $user_registered = User::role('user')->count();

        foreach ($periods as  $per) {
            foreach ($per as  $p) {
                $stock+=$p->stock;
            }
        }
        $data = [
            'phases' => $phases,
            'periods' => $periods,
            'stock' => $stock,
            'tickets_sold' => $tickets_sold,
            'tickets_sold_today' => $tickets_sold_today,
            'user_registered' => $user_registered,
        ];
        // return response()->json($data);
        return view('pages.admin.index', $data);
    }

    public function scanner()
    {
        return view('pages.admin.scanner.index');
    }
}
