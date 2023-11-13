<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Study;

class StudiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Study::create(['name' => 'Bachelor']);
        Study::create(['name' => 'Master']);
        Study::create(['name' => 'PhD']);
    }
}
