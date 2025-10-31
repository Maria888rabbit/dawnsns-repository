<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //下記記述のDB::tableを使用するための記述
use Illuminate\Support\Facades\Hash; //下記記述のHash::makeを使用するための記述

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            [
                'name' => 'HRI太郎',
                'email' => 'tarou@mail.com',
                'password' => Hash::make('tarou11'), //パスワードをハッシュ化、もとの文字列から変換する
                'bio' => '初めまして',
                'image' => 'edit.png',
                'created_at' => '2021-3-1 18:35:48',
                'updated_at' => '2021-3-1 18:35:48',
            ],
            [
                'name' => 'HRI次郎',
                'email' => 'jirou@mail.com',
                'password' => Hash::make('jirou22'),
                'bio' => null,
                'image' => 'dawn.png',
                'created_at' => '2021-5-10 15:57:21',
                'updated_at' => '2021-5-10 15:57:21',
            ],
            [
                'name' => 'HRI花子',
                'email' => 'hanako@mail.com',
                'password' => Hash::make('hanako33'),
                'bio' => null,
                'image' => 'default.png',
                'created_at' => '2021-7-20 10:19:34',
                'updated_at' => '2021-7-20 10:19:34',
            ],
            [
                'name' => 'HRI順子',
                'email' => 'junko@mail.com',
                'password' => Hash::make('junko44'),
                'bio' => 'こんにちは',
                'image' => 'default.png',
                'created_at' => '2021-10-13 7:23:19',
                'updated_at' => '2021-10-13 7:23:19',
            ],
        ]);
    }
}
