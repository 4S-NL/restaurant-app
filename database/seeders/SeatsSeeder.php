<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SeatsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seat::create([
            'number' => 100,
            'amount_seats' => 8
        ]);

        Seat::create([
            'number' => 101,
            'amount_seats' => 4
        ]);

        Seat::create([
            'number' => 102,
            'amount_seats' => 2
        ]);

        Seat::create([
            'number' => 103,
            'amount_seats' => 4
        ]);
    }
}
