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
                'title' => 'ソードアートオンラインⅡ',
                'user_id' => '1',
                'commentp_id' => '1',
                
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'title' => 'ソードアートオンライン',
                'user_id' => '1',
                'commentp_id' => '1',
               
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'title' => '東京喰種トウキョウグール',
                'user_id' => '1',
                'commentp_id' => '1',
               
        ]);
        
        
        DB::table('ranks')->insert([
                'number' => '1',
                'title' => '氷菓',
                'user_id' => '2',
                'commentp_id' => '2',
               
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'title' => '荒川アンダーザブリッジ',
                'user_id' => '2',
                'commentp_id' => '2',
               
        ]);
       
       DB::table('ranks')->insert([
                'number' => '3',
                'title' => '東京喰種トウキョウグール',
                'user_id' => '2',
                'commentp_id' => '2',
               
        ]);
        
        DB::table('ranks')->insert([
                'number' => '1',
                'title' => '陰の実力者になりたくて！ 2nd season',
                'user_id' => '3',
                'commentp_id' => '3',
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'title' => '氷菓',
                'user_id' => '3',
                'commentp_id' => '3',
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'title' => 'アルドノア・ゼロ',
                'user_id' => '3',
                'commentp_id' => '3',
        ]);
        
        DB::table('ranks')->insert([
                'number' => '1',
                'title' => '機動戦士ガンダムユニコーン RE：0096',
                'user_id' => '4',
                'commentp_id' => '4',

        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'title' => '機動戦士ガンダムSEED HDリマスター',
                'user_id' => '4',
                'commentp_id' => '4',
         
        ]);
        
        DB::table('ranks')->insert([
                'number' => '3',
                'title' => '転生したらスライムだった件',
                'user_id' => '4',
                'commentp_id' => '4',
          
        ]);
        
        DB::table('ranks')->insert([
                'number' => '1',
                'title' => 'マギ',
                'user_id' => '14',
                'commentp_id' => '5',
               
        ]);
        
        DB::table('ranks')->insert([
                'number' => '2',
                'title' => '七つの大罪　黙示録の四騎士',
                'user_id' => '14',
                'commentp_id' => '5',
               
        ]);
       
       DB::table('ranks')->insert([
                'number' => '3',
                'title' => 'ぐらんぶる',
                'user_id' => '14',
                'commentp_id' => '5',
              
        ]);
    }
}
