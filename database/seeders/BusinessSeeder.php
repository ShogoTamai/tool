<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('businesses')->insert([
            'id'=>'1',
            'industry_id'=>'1',
            'name'=>'食品']);
        DB::table('businesses')->insert([
            'id'=>'2',
            'industry_id'=>'1',
            'name'=>'建築']);
        DB::table('businesses')->insert([
            'id'=>'3',
            'industry_id'=>'1',
            'name'=>'自動車']);
        DB::table('businesses')->insert([
            'id'=>'4',
            'industry_id'=>'1',
            'name'=>'その他メーカー']);
        DB::table('businesses')->insert([
            'id'=>'5',
            'industry_id'=>'2',
            'name'=>'不動産']);
        DB::table('businesses')->insert([
            'id'=>'6',
            'industry_id'=>'2',
            'name'=>'電力']);
        DB::table('businesses')->insert([
            'id'=>'7',
            'industry_id'=>'2',
            'name'=>'医療・福祉']);
        DB::table('businesses')->insert([
            'id'=>'8',
            'industry_id'=>'2',
            'name'=>'人材サービス']);
        DB::table('businesses')->insert([
            'id'=>'9',
            'industry_id'=>'2',
            'name'=>'その他サービス・インフラ']);
        DB::table('businesses')->insert([
            'id'=>'10',
            'industry_id'=>'3',
            'name'=>'総合商社']);
        DB::table('businesses')->insert([
            'id'=>'11',
            'industry_id'=>'3',
            'name'=>'専門商社']);
        DB::table('businesses')->insert([
            'id'=>'12',
            'industry_id'=>'4',
            'name'=>'ソフトウェア']);
        DB::table('businesses')->insert([
            'id'=>'13',
            'industry_id'=>'4',
            'name'=>'インターネット']);
        DB::table('businesses')->insert([
            'id'=>'14',
            'industry_id'=>'4',
            'name'=>'通信']);
        DB::table('businesses')->insert([
            'id'=>'15',
            'industry_id'=>'5',
            'name'=>'百貨店・スーパー']);
        DB::table('businesses')->insert([
            'id'=>'16',
            'industry_id'=>'5',
            'name'=>'コンビニ']);
        DB::table('businesses')->insert([
            'id'=>'17',
            'industry_id'=>'5',
            'name'=>'専門店']);
        DB::table('businesses')->insert([
            'id'=>'18',
            'industry_id'=>'6',
            'name'=>'出版']);
        DB::table('businesses')->insert([
            'id'=>'19',
            'industry_id'=>'6',
            'name'=>'広告']);
        DB::table('businesses')->insert([
            'id'=>'20',
            'industry_id'=>'6',
            'name'=>'その他出版・広告']);
        DB::table('businesses')->insert([
            'id'=>'21',
            'industry_id'=>'7',
            'name'=>'銀行・証券']);
        DB::table('businesses')->insert([
            'id'=>'22',
            'industry_id'=>'7',
            'name'=>'信販・リース']);
        DB::table('businesses')->insert([
            'id'=>'23',
            'industry_id'=>'7',
            'name'=>'生保・損保']);
        DB::table('businesses')->insert([
            'id'=>'24',
            'industry_id'=>'8',
            'name'=>'その他団体・公務員']);
        
    }
}
