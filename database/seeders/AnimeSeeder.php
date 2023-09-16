<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AnimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animes')->insert([
                'name' => 'ソードアートオンライン',
                'body' => '主人公最強',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2012',
                'category_id' => '1'
    
        ]);
        
        DB::table('animes')->insert([
                'name' => 'ソードアートオンラインⅡ',
                'body' => '主人公最強',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2014',
                'category_id' => '1'
        ]);
        
        DB::table('animes')->insert([
                'name' => '転生したらスライムだった件',
                'body' => '主人公最強',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2018',
                'category_id' => '1'
        ]);
        
        DB::table('animes')->insert([
                'name' => '機動戦士ガンダムSEED HDリマスター',
                'body' => '平成のガンダム',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2011',
                'category_id' => '3'
        ]);
        
        DB::table('animes')->insert([
                'name' => '機動戦士ガンダムユニコーン RE：0096',
                'body' => '宇宙世紀に沿った話の続き',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2016',
                'category_id' => '3'
        ]);
        
        DB::table('animes')->insert([
                'name' => 'アルドノア・ゼロ',
                'body' => '弱い期待だけど頑張る',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2014',
                'category_id' => '3'
        ]);
        
        DB::table('animes')->insert([
                'name' => '荒川アンダーザブリッジ',
                'body' => '平成のガンダム',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2010',
                'category_id' => '3'
        ]);
        
        DB::table('animes')->insert([
                'name' => '氷菓',
                'body' => '宇宙世紀に沿った話の続き',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2012',
                'category_id' => '4'
        ]);
        
        DB::table('animes')->insert([
                'name' => 'ぐらんぶる',
                'body' => '弱い期待だけど頑張る',
                'image' => '画像データ',
                'link' => 'リンクをはる',
                'era' => '2018',
                'category_id' => '5'
        ]);
        
    }
}
