<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::unprepared("INSERT INTO `states` (`id`, `name`, `country_id`) VALUES
        (11, 'ACEH', 100),
        (12, 'SUMATERA UTARA', 100),
        (13, 'SUMATERA BARAT', 100),
        (14, 'RIAU', 100),
        (15, 'JAMBI', 100),
        (16, 'SUMATERA SELATAN', 100),
        (17, 'BENGKULU', 100),
        (18, 'LAMPUNG', 100),
        (19, 'KEPULAUAN BANGKA BELITUNG', 100),
        (21, 'KEPULAUAN RIAU', 100),
        (31, 'DKI JAKARTA', 100),
        (32, 'JAWA BARAT', 100),
        (33, 'JAWA TENGAH', 100),
        (34, 'DI YOGYAKARTA', 100),
        (35, 'JAWA TIMUR', 100),
        (36, 'BANTEN', 100),
        (51, 'BALI', 100),
        (52, 'NUSA TENGGARA BARAT', 100),
        (53, 'NUSA TENGGARA TIMUR', 100),
        (61, 'KALIMANTAN BARAT', 100),
        (62, 'KALIMANTAN TENGAH', 100),
        (63, 'KALIMANTAN SELATAN', 100),
        (64, 'KALIMANTAN TIMUR', 100),
        (65, 'KALIMANTAN UTARA', 100),
        (71, 'SULAWESI UTARA', 100),
        (72, 'SULAWESI TENGAH', 100),
        (73, 'SULAWESI SELATAN', 100),
        (74, 'SULAWESI TENGGARA', 100),
        (75, 'GORONTALO', 100),
        (76, 'SULAWESI BARAT', 100),
        (81, 'MALUKU', 100),
        (82, 'MALUKU UTARA', 100),
        (91, 'PAPUA BARAT', 100),
        (94, 'PAPUA', 100)");
    }
}
