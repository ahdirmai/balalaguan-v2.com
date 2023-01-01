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
            'name' => 'Balalaguan Music Festival',
            'description' => 'lorem ipsum',
            'payment_name' => 'Joko Roeswanto',
            'payment_account' => 'Dana 0859-3939-5319',
            'contact_name' => '085939395319 (Whatsapp)',
            'contact_number' => '085939395319',
        ];

        Event::create($data);
    }
}
