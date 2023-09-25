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
                'anime_id' => '6',
                'user_id' => '1'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'anime_id' => '10',
                'user_id' => '1'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'anime_id' => '13',
                'user_id' => '1'
        ]);
        
        
        DB::table('ranks')->insert([
                'number' => '1',
                'anime_id' => '7',
                'user_id' => '2'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'anime_id' => '9',
                'user_id' => '2'
        ]);
       
       DB::table('ranks')->insert([
                'number' => '3',
                'anime_id' => '13',
                'user_id' => '2'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '1',
                'anime_id' => '12',
                'user_id' => '3'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'anime_id' => '8',
                'user_id' => '3'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'anime_id' => '6',
                'user_id' => '3'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '1',
                'anime_id' => '2',
                'user_id' => '4'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'anime_id' => '1',
                'user_id' => '4'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'anime_id' => '3',
                'user_id' => '4'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '1',
                'anime_id' => '7',
                'user_id' => '11'
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'anime_id' => '9',
                'user_id' => '11'
        ]);
       
       DB::table('ranks')->insert([
                'number' => '3',
                'anime_id' => '13',
                'user_id' => '11'
        ]);
    }
}
