<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        $this->call(LanguageSeeder::class);
        $this->call(RoleAndUserSeeder::class);
        $this->call(MenuAndPermissionSeeder::class);
        $this->call(CountriesSeeder::class);
        $this->call(StatesSeeder::class);
        $this->call(CitiesSeeder::class);
        $this->call(StudiesSeeder::class);
        $this->call(CandidateSeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(MemberSeeder::class);
    }
}
