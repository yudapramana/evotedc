<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Model\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::insert([
            [
                'locale' => 'in',
                'language' => 'Indonesia',
                'direction' => 'ltr'
            ],
//            [
//                'locale' => 'en',
//                'language' => 'English',
//                'direction' => 'ltr'
//            ],
//            [
//                'locale' => 'ar',
//                'language' => 'Arabic',
//                'direction' => 'rtl'
//            ],
//            [
//                'locale' => 'ko',
//                'language' => 'Korean',
//                'direction' => 'ltr'
//            ]
        ]);
    }
}
