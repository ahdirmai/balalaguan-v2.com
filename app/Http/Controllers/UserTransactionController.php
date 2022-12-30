<?php

namespace App\Http\Controllers;

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
        //
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


        $transaction = Transaction::create($data);
        if ($transaction) {
            flash()->addSuccess('Transaksi berhasil dibuat, silakan lakukan pembayaran');
        } else {
            flash()->addError('Transaksi gagal dibuat!');
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
        $transaction = Transaction::findOrFail($id);
        $data = [
            'transaction' => $transaction,
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
        return redirect()->route('landing-page');
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
