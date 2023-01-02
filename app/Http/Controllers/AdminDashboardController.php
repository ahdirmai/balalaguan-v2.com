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

        $tickets = Ticket::with('transaction.period.category', 'transaction.period.phase')->get();
        $tickets_sold = $tickets->count();
        $dateToday = date_format(new DateTime('now'), 'Y-m-d');
        $tickets_sold_today = $tickets->where('created_at', '>=', $dateToday)->count();
        $tickets_sold_festival = 0;
        $tickets_sold_vip = 0;
        foreach ($tickets as  $t) {
            $category_name = $t->transaction->period->category->name;
            if ($category_name == 'Festival') {
                $tickets_sold_festival++;
            } else if ($category_name == 'VIP') {
                $tickets_sold_vip++;
            }
        };
        $user_registered = User::role('user')->count();
        $stock_ticket_vip = 0;
        $stock_ticket_festival = 0;

        // return response()->json($periods);
        foreach ($periods as  $per) {
            foreach ($per as  $p) {
                $category_name = $p->category->name;
                if ($category_name == 'Festival') {
                    $stock_ticket_festival += $p->stock;
                } else if ($category_name == 'VIP') {
                    $stock_ticket_vip += $p->stock;
                }
                $stock += $p->stock;
            }
        }
        $data = [
            'phases' => $phases,
            'periods' => $periods,
            'stock' => $stock,
            'tickets_sold' => $tickets_sold,
            'tickets_sold_today' => $tickets_sold_today,
            'user_registered' => $user_registered,
            'tickets_sold_festival' => $tickets_sold_festival,
            'tickets_sold_vip' => $tickets_sold_vip,
            'stock_ticket_vip' => $stock_ticket_vip,
            'stock_ticket_festival' => $stock_ticket_festival,
        ];
        // return response()->json($data);
        return view('pages.admin.index', $data);
    }

    public function scanner()
    {
        return view('pages.admin.scanner.index');
    }
}
