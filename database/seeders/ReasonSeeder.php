<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class ReasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reasons')->insert([
                'title' => 'ええ感じやねん',
                'body' => '面白い',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '1',
        ]);
         
        DB::table('reasons')->insert([
                'title' => 'ええ感',
                'body' => '興味深いなり',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '2',
        ]);
        
        DB::table('reasons')->insert([
                'title' => 'ええん',
                'body' => '世界は英雄を欲している',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '3',
               
        ]);
        
        DB::table('reasons')->insert([
                'title' => 'やねん',
                'body' => 'お前の席ねえから！！',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '4',
                
        ]);
        
        DB::table('reasons')->insert([
                'title' => '感じや',
                'body' => '最＆高',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
                'user_id' => '5',
             
         ]);
    }
}