<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contents')->insert([
            [
                'content' => 'ドットインストール',
                'color_code' => '#A3E0FF',
           
            ],[
                'content' => 'N予備校',
                'color_code' => '#72CDFA',
            ],[
                'content' => 'POSSE課題',
                'color_code' => '#3184AD',
            ]
        ]);
    }
}
