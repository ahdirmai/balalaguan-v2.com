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
            'payment_name' => 'Oka R Abdillah (Dana)',
            'payment_account' => '123456789012',
            'contact_name' => 'Oka (Whatsapp)',
            'contact_number' => '081923657893',
        ];

        Event::create($data);
    }
}
