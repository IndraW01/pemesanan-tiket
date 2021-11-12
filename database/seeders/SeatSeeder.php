<?php

namespace Database\Seeders;

use App\Models\Seat;
use Illuminate\Database\Seeder;

class SeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Seat::create([
            'seat' => 'A',
            'no_bangku' => 'A1'
        ]);
        Seat::create([
            'seat' => 'A',
            'no_bangku' => 'A2'
        ]);
        Seat::create([
            'seat' => 'A',
            'no_bangku' => 'A3'
        ]);
        Seat::create([
            'seat' => 'A',
            'no_bangku' => 'A4'
        ]);
        Seat::create([
            'seat' => 'A',
            'no_bangku' => 'A5'
        ]);

        Seat::create([
            'seat' => 'B',
            'no_bangku' => 'B1'
        ]);
        Seat::create([
            'seat' => 'B',
            'no_bangku' => 'B2'
        ]);
        Seat::create([
            'seat' => 'B',
            'no_bangku' => 'B3'
        ]);
        Seat::create([
            'seat' => 'B',
            'no_bangku' => 'B4'
        ]);
        Seat::create([
            'seat' => 'B',
            'no_bangku' => 'B5'
        ]);
    }
}
