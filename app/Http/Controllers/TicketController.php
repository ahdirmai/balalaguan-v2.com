<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::with(['transaction.period.category', 'transaction.user'])->get();
        $data = [
            'tickets' => $tickets,
        ];
        // return response()->json($data);
        return view('pages.admin.ticket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }

    public function checkIn(Request $request)
    {
        // dd($request);
        $token = base64_decode($request->decoded);
        $ticket = Ticket::where('token', $token)->with('transaction.user')->first();
        $username = $ticket->transaction->user->name;
        // return response()->json($ticket);
        if ($ticket != null) {
            if ($ticket->is_checked_in == 0) {
                if ($ticket->update(['is_checked_in' => 1])) {
                    flash()->addSuccess("Scan berhasil, silakan masuk ${username}!");
                } else {
                    flash()->addError('Terjadi kesalahan, silakan coba lagi!');
                }
            } else {
                flash()->addWarning("${username} sudah melakukan check-in!");
            }
        } else {
            flash()->addError('Tiket tidak sesuai, silakan coba lagi!');
        }
        return redirect()->route('admin.scanner');
    }
}
