<?php

namespace Database\Seeders;

use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schedule::create([
            'schedule' => '13.30'
        ]);
        Schedule::create([
            'schedule' => '16.30'
        ]);
        Schedule::create([
            'schedule' => '19.30'
        ]);
    }
}
