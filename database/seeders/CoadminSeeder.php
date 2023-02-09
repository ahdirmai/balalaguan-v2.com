<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CoadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make coadmin account
        for ($i = 1; $i <= 10; $i++) {
            $data = [
                'name' => "Wakil Admin ${i}",
                'email' => "coadmin${i}@balalaguan.com",
                'address' => 'Barito Kuala',
                'nik' => "${i}23456789123456${i}",
                'phone' => '085939395319',
                'password' => Hash::make("coadmin00${i}balalaguan"),
            ];

            $user = User::create($data);
            $user->assignRole('coadmin');
        }
    }
}
