<?php

namespace Database\Seeders;

use JeroenZwart\CsvSeeder\CsvSeeder;
use Illuminate\Support\Facades\DB;


class MemberSeeder extends CsvSeeder
{
    public function __construct()
    {
        $this->tablename = 'members';
        $this->file = '/database/seeds/csvs/members.csv';
        $this->truncate = false;
        $this->delimiter = ',';
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
        DB::disableQueryLog();
        parent::run();
    }
}
