<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CoadminController extends Controller
{
    public function index()
    {
        $coadmin = User::role('coadmin')->get();
        // return response()->json($coadmin);
        $data = [
            'coadmin' => $coadmin,
        ];
        return view('pages.admin.coadmin.index', $data);
    }

    public function create()
    {
        return view('pages.admin.coadmin.form');
    }

    public function store(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nik' => ['required', 'min:16', 'max:16', 'unique:users'],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ], [
            'nik.unique' => 'NIK yang digunakan telah terdaftar',
            'email.unique' => 'Email yang digunakan telah terdaftar',
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nik' => $data['nik'],
            'phone' => $data['phone'],
            'address' => $data['address'],
        ]);

        // give user role 'coadmin'
        $user->assignRole('coadmin');
        flash()->addSuccess("Sukses membuat akun co-admin dengan username ". $user->name);
        return redirect()->route('admin.coadmin.index');
    }

    public function edit()
    {
        return view('pages.admin.coadmin.form');
    }

    public function update(Request $request)
    {
        dd($request);
    }
}