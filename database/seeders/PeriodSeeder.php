<?php

namespace Database\Seeders;

use App\Models\Period;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'phase_id' => 1,
                'category_id' => 1,
                'price' => 150000,
                'stock' => 25,
                'is_active' => 1,
            ], [
                'phase_id' => 1,
                'category_id' => 2,
                'price' => 250000,
                'stock' => 25,
                'is_active' => 1,
            ], [
                'phase_id' => 2,
                'category_id' => 1,
                'price' => 200000,
                'stock' => 150,
                'is_active' => 0,
            ], [
                'phase_id' => 2,
                'category_id' => 2,
                'price' => 300000,
                'stock' => 50,
                'is_active' => 0,
            ], [
                'phase_id' => 3,
                'category_id' => 1,
                'price' => 250000,
                'stock' => 1000,
                'is_active' => 0,
            ], [
                'phase_id' => 3,
                'category_id' => 2,
                'price' => 400000,
                'stock' => 75,
                'is_active' => 0,
            ], [
                'phase_id' => 4,
                'category_id' => 1,
                'price' => 300000,
                'stock' => 3500,
                'is_active' => 0,
            ], [
                'phase_id' => 4,
                'category_id' => 2,
                'price' => 400000,
                'stock' => 50,
                'is_active' => 0,
            ],
        ];

        foreach ($data as $d) {
            Period::create($d);
        }
    }
}
