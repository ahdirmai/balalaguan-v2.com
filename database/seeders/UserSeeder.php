<?php

namespace Database\Seeders;

use App\Models\Chance;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRoles;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make admin account
        $data = [
            'name' => 'admin',
            'email' => 'admin@balalaguan.com',
            'address' => 'jalan trans kalimantan',
            'nik' => '123456789',
            'phone' => '081253780486',
            'password' => Hash::make('12345678'),
        ];

        $user = User::create($data);
        $user->assignRole('admin');

        // Make user account
        $rizkiData = [
            'name' => 'Muhammad Rizki Al-Ghifari',
            'email' => 'mrizkiag1027@gmail.com',
            'address' => 'Jalan Martapura Lama',
            'nik' => '6303012341234',
            'phone' => '081917259445',
            'password' => Hash::make('12345678'),
        ];

        $rizki = User::create($rizkiData);
        $rizki->assignRole('user');

        $rizkiChanceData = [
            'user_id' => $rizki->id,
            'chance' => 2,
        ];
        Chance::create($rizkiChanceData);
    }
}
