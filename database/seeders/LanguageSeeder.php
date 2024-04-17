<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $languages = ['1' => 'Afrikaans', '2' => 'English', '3' => 'isiXhosa', '4' => 'isiZulu',
                 '5' => 'Sesotho', '6' => 'Xitsonga','7' => 'isiNdebele', '8' => 'Xitsonga',
                 '9' => 'siSwati', '10' => 'Tshivenda','10' => 'Setswana'
                ];

            foreach($languages as $language) {
                Language::create([
                    'name' => $language
                ]);
            }
    }
}
