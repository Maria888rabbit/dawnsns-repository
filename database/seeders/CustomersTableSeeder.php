<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //下記記述のDB::tableを使用するための記述
use Illuminate\Support\Facades\Hash; //下記記述のHash::makeを使用するための記述


class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([
            [
                'name' => 'HRI太郎',
                'email' => 'tarou@mail.com',
                'password' => Hash::make('tarou11'), //パスワードをハッシュ化、もとの文字列から変換する
                'tel' => '0801111111',
                'postal_code' => 1111111,
                'address' => '新潟県阿賀野市百津町252-10',
                'created_at' => '2021-3-1 18:35:48',
                'updated_at' => '2021-3-1 18:35:48',
            ],
            [
                'name' => 'HRI次郎',
                'email' => 'jirou@mail.com',
                'password' => Hash::make('jirou22'),
                'tel' => '0902222222',
                'postal_code' => 2222222,
                'address' => '北海道釧路市弁天ケ浜882-4',
                'created_at' => '2021-5-10 15:57:21',
                'updated_at' => '2021-5-10 15:57:21',
            ],
            [
                'name' => 'HRI花子',
                'email' => 'hanako@mail.com',
                'password' => Hash::make('hanako33'),
                'tel' => '0803333333',
                'postal_code' => 3333333,
                'address' => '兵庫県神戸市垂水区星陵台3-178-19',
                'created_at' => '2021-7-20 10:19:34',
                'updated_at' => '2021-7-20 10:19:34',
            ],
            [
                'name' => 'HRI順子',
                'email' => 'junko@mail.com',
                'password' => Hash::make('junko44'),
                'tel' => '0904444444',
                'postal_code' => 1111111,
                'address' => '長崎県南島原市北有馬町丙162-14',
                'created_at' => '2021-10-13 7:23:19',
                'updated_at' => '2021-10-13 7:23:19',
            ],
            [
                'name' => 'HRI真',
                'email' => 'makoto@mail.com',
                'password' => Hash::make('makoto55'),
                'tel' => '0805555555',
                'postal_code' => 5555555,
                'address' => '奈良県生駒市光陽台568-5',
                'created_at' => '2022-5-13 19:46:11',
                'updated_at' => '2022-5-13 19:46:11',
            ],
        ]);
    }
}
