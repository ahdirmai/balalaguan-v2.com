<?php

namespace Database\Seeders;

use App\Models\Phase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Early Bid'],
            ['name' => 'Presale 1'],
            ['name' => 'Presale 2'],
            ['name' => 'Presale 3'],
        ];

        foreach ($data as $d) {
            Phase::create($d);
        }
    }
}