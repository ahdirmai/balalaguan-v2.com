<?php

namespace App\Http\Controllers;

use App\Models\Chance;
use App\Models\Period;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class UserTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::where('user_id', auth()->user()->id)->with('period.category', 'period.phase', 'tickets')->get();
        $data = [
            'transactions' => $transactions,
        ];
        // return response()->json($data);
        return view('pages.user.transaction.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($period_id, $amount)
    {
        $period = Period::where('id', $period_id)
            ->with('category', 'phase')->get();
        $quantity = $amount;
        $totalPayment = $quantity * $period[0]->price;
        // dd($totalPayment);
        $data = [
            'period' => $period[0],
            'quantity' => $quantity,
            'totalPayment' => $totalPayment,
        ];
        // return response()->json($data);
        return view('pages.user.transaction.detail', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'period_id' => 'numeric|required',
            'user_id' => 'numeric|required',
            'quantity' => 'numeric|required',
        ]);


        
        $user_id = auth()->user()->id;
        $chance = Chance::where('user_id', $user_id)->first();
        $userChance = $chance->chance;
        $quantity = $request->quantity;
        $period = Period::findOrFail($request->period_id);
        
        // return response()->json($chance);
        // Cek apakah user masih memiliki chance
        if ($userChance > 0) {
            $finalChance = $userChance - $quantity;
            // Cek jumlah tiket yang dibeli sesuai dengan chance yang tersisa
            if ($finalChance >= 0) {
                // Cek apakah stok tiket masih ada
                if ($period->stock > 0 && $period->stock - $quantity >= 0) {
                    $transaction = Transaction::create($data);
                    if ($transaction) {
                        // Kurangi chance user membeli tiket
                        $chance->update(['chance' => $finalChance]);

                        flash()->addSuccess('Transaksi berhasil dibuat, silakan lakukan pembayaran');
                    } else {
                        flash()->addError('Transaksi gagal dibuat!');
                        return redirect()->route('landing-page');
                    }
                } else {
                    flash()->addError('Maaf, stok tiket habis');
                    return redirect()->route('landing-page');
                }
            } else {
                flash()->addError('Maaf, setiap user hanya dapat diberikan maksimal 2 tiket.');
                return redirect()->route('landing-page');
            }
        } else {
            flash()->addError('Maaf, setiap user hanya dapat diberikan maksimal 2 tiket.');
            return redirect()->route('landing-page');
        }
        return redirect()->route('user.transaction.show', $transaction->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // dd($id);
        $transaction = Transaction::where('id', $id)
            ->with('period.category', 'period.phase', 'tickets')->get();
        $data = [
            'transaction' => $transaction[0],
        ];
        // return response()->json($data);
        return view('pages.user.transaction.payment', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        $data = $request->validate([
            'image' => 'image|required',
        ]);
        $data['is_paid'] = 1;

        if ($request->hasFile('image') && $request->file('image')->isValid())
            $transaction->addMediaFromRequest('image')->toMediaCollection('image');

        if ($transaction->update($data)) {
            flash()->addSuccess('Silakan tunggu proses verifikasi oleh admin');
        } else {
            flash()->addError('Upload gagal!');
            return redirect()->route('user.transaction.show', $id);
        }
        return redirect()->route('user.transaction.index');
        // return redirect()->route('');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
