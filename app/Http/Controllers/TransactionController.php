<?php

namespace App\Http\Controllers;

use App\Models\Chance;
use App\Models\Period;
use App\Models\Ticket;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('is_verified', 0)->with(['period.category', 'period.phase', 'user.chances'])->get();
        $data = [
            'transactions' => $transactions,
        ];
        // return response()->json($data);
        return view('pages.admin.transactions.index', $data);
    }

    public function indexAll()
    {
        $transactions = Transaction::with(['period.category', 'period.phase', 'user.chances'])->get();
        $data = [
            'transactions' => $transactions,
        ];
        // return response()->json($data);
        return view('pages.admin.transactions.indexAll', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        // return view('pages.user.transaction.detail');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // return 'proses verifikasi berhasil (sekalian generate tiket sesuai quantity)';
        $quantity = $request->quantity;
        $chance = Chance::findOrFail($request->chance_id);
        $period = Period::findOrFail($request->period_id);
        $userChance = $chance->chance;
        $transaction = Transaction::findOrFail($id);
        $transactionGet = $transaction->with('user', 'period')->get();
        $username = $transactionGet[0]->user->name;

        // Cek apakah sudah bayar
        if ($transaction->is_paid == 1) {
            // Cek apakah user masih memiliki chance
            if ($chance->chance > 0) {
                $finalChance = $userChance - $quantity;
                // Cek jumlah tiket yang dibeli sesuai dengan chance yang tersisa
                if ($finalChance >= 0) {
                    // Cek apakah stok tiket masih ada
                    if ($period->stock > 0 && $period->stock - $quantity >= 0) {
                        // Kurangi stok tiket
                        $finalStock = $period->stock - $quantity;
                        $period->update(['stock' => $finalStock]);

                        // Kurangi chance user membeli tiket
                        $chance->update(['chance' => $finalChance]);

                        // Generate Ticket sesuai dengan quantity
                        for ($i = 0; $i < $quantity; $i++) {
                            $token = $username . uniqid();
                            $ticket = [
                                'transaction_id' => $transaction->id,
                                'token' => $token,
                                'is_checked_in' => 0,
                                'event_id' => 1,
                            ];
                            Ticket::create($ticket);
                        }

                        // Update status transaksi 
                        $transaction->update(['is_verified' => 1]);
                        flash()->addSuccess("Sukses membuat ${quantity} tiket untuk ${username}");
                    } else {
                        flash()->addError('Maaf, stok tiket habis.');
                    }
                } else {
                    flash()->addError('Maaf, setiap user hanya dapat diberikan maksimal 2 tiket.');
                }
            } else {
                flash()->addError('Maaf, setiap user hanya dapat diberikan maksimal 2 tiket.');
            }
        } else {
            flash()->addError("${username} belum bayar!");
        }
        return redirect()->route('admin.transactions.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

}
