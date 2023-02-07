<?php

namespace App\Http\Controllers;

use App\Events\Scanned;
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
        if (auth()->user() != null) {
            if (auth()->user()->hasRole('admin')) {
                return view('pages.admin.ticket.index', $data);
            } elseif (auth()->user()->hasRole('coadmin'))
                return view('pages.coadmin.ticket.index', $data);
        }
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
        $ticket = Ticket::where('token', $token)->with('transaction.user', 'transaction.period.category')->first();
        $ticket_category = $ticket->transaction->period->category->name;
        $username = $ticket->transaction->user->name;
        $userId = $ticket->transaction->user->id;
        $status = false;
        $message = '';

        // return response()->json($ticket);
        if ($ticket != null) {
            if ($ticket->is_checked_in == 0) {
                if ($ticket->update(['is_checked_in' => 1])) {
                    $status = true;
                    $message = "Scan berhasil, silakan masuk ${username} di kategori ${ticket_category}!";
                    flash()->addSuccess($message);
                } else {
                    $status = false;
                    $message = 'Terjadi kesalahan, silakan coba lagi!';
                    flash()->addError($message);
                }
            } else {
                $status = false;
                $message = "${username} sudah melakukan check-in!";
                flash()->addWarning($message);
            }
        } else {
            $status = false;
            $message = 'Tiket tidak sesuai, silakan coba lagi!';
            flash()->addError($message);
        }
        // Trigger event
        event(
            new Scanned(json_encode([
                "status" => $status,
                "username" => $username,
                "userId" => $userId,
                "message" => $message,
            ]))
        );
        if (auth()->user() != null) {
            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('admin.scanner');
            } elseif (auth()->user()->hasRole('coadmin'))
                return redirect()->route('coadmin.scanner');
        }
    }
}
