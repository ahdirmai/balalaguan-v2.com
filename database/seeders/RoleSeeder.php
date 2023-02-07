<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $roles = ['admin', 'user', 'coadmin'];

        // foreach ($roles as $role) {
        //     Role::create(['name' => $role]);
        // }

        Role::create(['name' => 'coadmin']);
    }
}
