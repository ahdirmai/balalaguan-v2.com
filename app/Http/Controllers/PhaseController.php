<?php

namespace App\Http\Controllers;

use App\Models\Phase;
use Illuminate\Http\Request;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phases = Phase::all();
        $data = [
            'phases' => $phases,
        ];
        return view('pages.admin.phases.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Paket Tiket',
            'url' => route('admin.phases.store'),
        ];
        return view('pages.admin.phases.form', $data);
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
            'name' => 'string|required',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
        if (Phase::create($data)) {
            flash()->addSuccess('Berhasil menambahkan paket tiket!');
        } else {
            flash()->addError('Gagal menambahkan paket tiket!');
        }
        return redirect()->route('admin.phases.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $phase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $phase = Phase::findOrFail($id);
        $data = [
            'title' => 'Edit paket tiket',
            'url' => route('admin.phases.update', $id),
            'phase' => $phase,
        ];
        return view('pages.admin.phases.form', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phase = Phase::findOrFail($id);
        $data = $request->validate([
            'name' => 'string|required',
            'start' => 'required|date',
            'end' => 'required|date',
        ]);
        if ($phase->update($data)) {
            flash()->addSuccess('Berhasil memperbarui paket tiket!');
        } else {
            flash()->addError('Gagal memperbarui paket tiket!');
        }
        return redirect()->route('admin.phases.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $phase = Phase::findOrFail($id);
        $name = $phase->name;
        if ($phase->delete()) {
            flash()->addSuccess('Berhasil menghapus paket tiket ' . $name . '!');
        } else {
            flash()->addError('Gagal menghapus paket tiket!');
        }
        return redirect()->route('admin.phases.index');
    }
}
