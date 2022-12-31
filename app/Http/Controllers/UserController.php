<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('pages.user.profile.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('pages.user.profile.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);
        $old_email = $user->email;
        $old_nik = $user->nik;
        $email_unique = 'unique:users';
        $nik_unique = 'unique:users';

        if ($old_email == $request->email) {
            $email_unique = '';
        }

        if ($old_nik == $request->nik) {
            $nik_unique = '';
        }
        $data =  $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', $email_unique],
            'nik' => ['required', ' ', 'max:255', $nik_unique],
            'phone' => ['required', 'string', 'max:255'],
            'address' => ['required', 'string', 'max:255'],
        ]);

        if ($user->update($data)) {
            flash()->addSuccess('Berhasil memperbarui profil');
        } else {
            flash()->addError('Gagal memperbarui profil');
        }
        return redirect()->route('user.profile.index');
    }
}
