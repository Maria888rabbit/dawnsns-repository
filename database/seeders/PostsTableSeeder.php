<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //下記記述のDB::tableを使用するための記述
use Illuminate\Support\Facades\Hash; //下記記述のHash::makeを使用するための記述

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'user_id' => 1,
                'post' => 'こんにちは、初めまして！',
                'created_at' => '2021-03-02 09:00:00',
                'updated_at' => '2021-03-02 09:00:00',
            ],
            [
                'user_id' => 2,
                'post' => '今日のごはんはカレーでした。',
                'created_at' => '2021-05-11 14:30:00',
                'updated_at' => '2021-05-11 14:30:00',
            ],
            [
                'user_id' => 3,
                'post' => 'はじめまして、よろしくお願いします。',
                'created_at' => '2021-07-21 12:15:00',
                'updated_at' => '2021-07-21 12:15:00',
            ],
            [
                'user_id' => 4,
                'post' => 'ひまだなー。',
                'created_at' => '2021-10-14 08:45:00',
                'updated_at' => '2021-10-14 08:45:00',
            ],
        ]);
    }
}
