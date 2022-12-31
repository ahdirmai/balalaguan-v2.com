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
            ['name' => 'Early Bird'],
            ['name' => 'Presale 1'],
            ['name' => 'Presale 2'],
            ['name' => 'Normal'],
        ];

        foreach ($data as $d) {
            Phase::create($d);
        }
    }
}
