<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ranks')->insert([
                'number' => '1',
                'anime_id' => '6'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'anime_id' => '10'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'anime_id' => '13'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '4',
                'anime_id' => '7'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '5',
                'anime_id' => '9'
        ]);
       
        
    }
}
