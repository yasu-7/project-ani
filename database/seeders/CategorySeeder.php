<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
                'name' => '主人公最強',
        ]);
        
        DB::table('categories')->insert([
                'name' => 'ラブコメ',
        ]);
        
        DB::table('categories')->insert([
                'name' => 'ロボット',
        ]);
        
        DB::table('categories')->insert([
                'name' => '学園系',
        ]);
        
        DB::table('categories')->insert([
                'name' => '日常系',
        ]);
        
    }
}
