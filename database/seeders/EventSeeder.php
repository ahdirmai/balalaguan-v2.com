<?php

namespace Database\Seeders;

use App\Models\Event;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' => 'Balalaguan',
            'description' => 'lorem ipsum',
            'payment_name' => 'Oka R Abdillah',
            'payment_account' => '123456789012',
            'contact_name' => 'Oka',
            'contact_number' => '081917259445',
        ];

        Event::create($data);
    }
}
