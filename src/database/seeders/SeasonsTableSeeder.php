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
            ['name' => 'spring', 'season' => '春'],
            ['name' => 'summer', 'season' => '夏'],
            ['name' => 'autumn', 'season' => '秋'],
            ['name' => 'winter', 'season' => '冬']
        ];
        foreach ($params as $param) {
            DB::table('seasons')->insert($param);
        }
    }
}
