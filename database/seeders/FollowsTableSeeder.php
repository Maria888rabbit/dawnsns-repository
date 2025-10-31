<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //下記記述のDB::tableを使用するための記述
use Illuminate\Support\Facades\Hash; //下記記述のHash::makeを使用するための記述

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('follows')->insert([
            // HRI太郎 (id:1) が他の全員をフォロー
            [
                'user_id' => 1,
                'follower_id' => 2,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'follower_id' => 3,
                'created_at' => now(),
            ],
            [
                'user_id' => 1,
                'follower_id' => 4,
                'created_at' => now(),
            ],

            // HRI次郎 (id:2) が 太郎と花子をフォロー
            [
                'user_id' => 2,
                'followed_id' => 1,
                'created_at' => now(),
            ],
            [
                'user_id' => 2,
                'follower_id' => 3,
                'created_at' => now(),
            ],

            // HRI花子 (id:3) が 順子をフォロー
            [
                'user_id' => 3,
                'follower_id' => 4,
                'created_at' => now(),
            ],

            // HRI順子 (id:4) が 花子をフォロー
            [
                'user_id' => 4,
                'follower_id' => 3,
                'created_at' => now(),
            ],
        ]);
    }
}
