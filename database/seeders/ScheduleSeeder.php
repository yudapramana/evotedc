<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Model\Schedule;

class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule = Schedule::create([
            'event' => 'Pemilu Raya BEM UNDIP 2022',
            'start_time' => '2022-12-01 08:00:00',
            'end_time' => '2022-12-01 16:00:00',
        ]);
    }
}
