<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            'name' => '春', '夏', '秋', '冬'
        ];
        foreach ($params as $param) {
            DB::table('seasons')->insert($params);
        }
    }
}