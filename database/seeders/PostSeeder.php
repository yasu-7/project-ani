<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
                'title' => '中学時代にはまったアニメ',
                'body' => '中学生時代に主人公最強に憧れた',
                'rate' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '1',
                'anime_id' => '6'
        ]);
        
        DB::table('posts')->insert([
                'title' => 'ラブコメを集めたよん',
                'body' => 'ハーレム最高！！',
                'rate' => '5',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '2',
                'anime_id' => '7'
        ]);
        
        DB::table('posts')->insert([
                'title' => 'ロボットアニメが好き！',
                'body' => 'ロマンがあるアニメ',
                'rate' => '6',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '3',
                'anime_id' => '8'
        ]);
        
        DB::table('posts')->insert([
                'title' => '日常系アニメ',
                'body' => 'ロマンがあるアニメ',
                'rate' => '4',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '4',
                'anime_id' => '9'
        ]);
        
        DB::table('posts')->insert([
                'title' => '日常系アニメ',
                'body' => '日常系最高',
                'rate' => '3',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '4',
                'anime_id' => '10'
        ]);
    }
}
