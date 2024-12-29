<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
            ['name' => 'winter', 'season' => '春'],
        ];
        foreach ($params as $param) {
        }   DB::table('seasons')->insert($param);
    }
}
