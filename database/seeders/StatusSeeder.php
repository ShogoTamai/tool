<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('statuses')->insert([
            'id'=>'1',
            'selection'=>'参加前']);
        DB::table('statuses')->insert([
            'id'=>'2',
            'selection'=>'インターンシップ']);
        DB::table('statuses')->insert([
            'id'=>'3',
            'selection'=>'説明会']);
        DB::table('statuses')->insert([
            'id'=>'4',
            'selection'=>'SE(テスト)']);
        DB::table('statuses')->insert([
            'id'=>'5',
            'selection'=>'一次選考']);
        DB::table('statuses')->insert([
            'id'=>'6',
            'selection'=>'二次選考']);
        DB::table('statuses')->insert([
            'id'=>'7',
            'selection'=>'最終選考']);
        DB::table('statuses')->insert([
            'id'=>'8',
            'selection'=>'二次選考']);
        DB::table('statuses')->insert([
            'id'=>'9',
            'selection'=>'最終選考']);
        DB::table('statuses')->insert([
            'id'=>'10',
            'selection'=>'内定']);
        DB::table('statuses')->insert([
            'id'=>'11',
            'selection'=>'その他']);
            
    }
}
