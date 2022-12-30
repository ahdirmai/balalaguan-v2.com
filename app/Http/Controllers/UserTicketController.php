<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class UserTicketController extends Controller
{
    public function index()
    {
        // $tickets = User::where('id', auth()->user()->id)->with('transactions.tickets', 'transactions.period.category')->get();
        $tickets = Transaction::where('user_id', auth()->user()->id)
        ->where('is_verified', 1)
        ->with('user', 'period.category', 'tickets')->get();
        $data = [
            'tickets' => $tickets,
        ];
        // return response()->json($data);
        return view('pages.user.ticket.index', $data);
    }
}
