<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('languages')->insert([
            [
                'language' => 'HTML',
                'color_code' => '#59DEEB',
           
            ],[
                'language' => 'CSS',
                'color_code' => '#49BCF2',
            ],[
                'language' => 'JavaScript',
                'color_code' => '#4D8DDB',
            ],[
                'language' => 'PHP',
                'color_code' => '#496EF2',
            ],[
                'language' => 'Laravel',
                'color_code' => '#4F4DEB',
            ],[
                'language' => 'SQL',
                'color_code' => '#633BD4',

            ],[
                'language' => 'SHELL',
                'color_code' => '#A34DF8',
            ],[
                'language' => '情報システム基礎知識(その他)',
                'color_code' => '#B63AE0',
            ]
        ]);
    }
}
