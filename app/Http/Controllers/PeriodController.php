<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Period;
use App\Models\Phase;
use DateTime;
use Exception;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class PeriodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $periods = Period::with('category', 'phase')->get();
        $data = [
            'periods' => $periods,
        ];
        return view('pages.admin.periods.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $phases = Phase::all();
        $data = [
            'title' => 'Tambah Paket',
            'url' => route('admin.periods.store'),
            'categories' => $categories,
            'phases' => $phases,
        ];
        return view('pages.admin.periods.form', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'phase_id' => 'numeric|required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'is_active' => 'required|boolean',
            'category_id' => 'required|int',
        ]);
        if (Period::create($data)) {
            flash()->addSuccess('Berhasil menambahkan paket!');
        } else {
            flash()->addError('Gagal menambahkan paket!');
        }
        return redirect()->route('admin.periods.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function show(Period $period)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $period = Period::findOrFail($id);
        $phases = Phase::all();
        $data = [
            'title' => 'Ubah Paket',
            'categories' => $categories,
            'period' => $period,
            'phases' => $phases,
            'url' => route('admin.periods.update', $id)
        ];
        return view('pages.admin.periods.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $period = Period::findOrFail($id);
        $data = $request->validate([
            'phase_id' => 'numeric|required',
            'price' => 'numeric|required',
            'stock' => 'numeric|required',
            'is_active' => 'required|boolean',
            'category_id' => 'required|int',
        ]);
        if ($period->update($data)) {
            flash()->addSuccess('Berhasil memperbarui paket!');
        } else {
            flash()->addError('Gagal memperbarui paket!');
        }
        return redirect()->route('admin.periods.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Period  $period
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $period = Period::findOrFail($id);
        $name = $period->name;
        if ($period->delete()) {
            flash()->addSuccess('Berhasil menghapus paket ' . $name . '!');
        } else {
            flash()->addError('Gagal menghapus paket!');
        }
        return redirect()->route('admin.periods.index');
    }
}
