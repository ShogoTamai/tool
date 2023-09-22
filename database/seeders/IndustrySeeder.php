<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('industries')->insert([
            'id'=>'1',
            'name'=>'メーカー']);
        DB::table('industries')->insert([
            'id'=>'2',
            'name'=>'サービス・インフラ']);
        DB::table('industries')->insert([
            'id'=>'3',
            'name'=>'商社']);
        DB::table('industries')->insert([
            'id'=>'4',
            'name'=>'ソフトウェア']);
        DB::table('industries')->insert([
            'id'=>'5',
            'name'=>'小売']);
        DB::table('industries')->insert([
            'id'=>'6',
            'name'=>'広告・出版']);
        DB::table('industries')->insert([
            'id'=>'7',
            'name'=>'金融']);
        DB::table('industries')->insert([
            'id'=>'8',
            'name'=>'その他']);
    }
}
