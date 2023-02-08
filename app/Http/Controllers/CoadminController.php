<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use Illuminate\Database\QueryException;

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
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ], [
            'email.unique' => 'Email yang digunakan telah terdaftar',
        ]);

        // Init faker
        $faker = Faker::create();

        $user = User::create([
            'name' => $data['name'],
            'password' => Hash::make($data['password']),
            'email' => $data['email'],
            'nik' => $faker->unique()->numberBetween(1000000000000000, 9999999999999999),
            'phone' => $faker->phoneNumber(),
            'address' => $faker->address(),
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

    public function destroy($id) {
        try {
            $user = User::findOrFail($id);
            $user->delete();
            flash()->addSuccess('Sukses menghapus akun co admin');
        } catch(QueryException $err) {
            flash()->addError($err->getMessage());
        }
        return redirect()->route('admin.coadmin.index');
    }
}