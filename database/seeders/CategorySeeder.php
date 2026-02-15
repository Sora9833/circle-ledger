<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $rows = [
            // income
            ['type' => 'income', 'name' => 'エントリー費', 'sort_order' => 10],
            ['type' => 'income', 'name' => '演奏会費',   'sort_order' => 20],
            ['type' => 'income', 'name' => 'その他',     'sort_order' => 90],

            // expense
            ['type' => 'expense', 'name' => '本番',         'sort_order' => 10],
            ['type' => 'expense', 'name' => 'ゲネプロ',     'sort_order' => 20],
            ['type' => 'expense', 'name' => '練習会場',     'sort_order' => 30],
            ['type' => 'expense', 'name' => '練習会場備品', 'sort_order' => 40],
            ['type' => 'expense', 'name' => '打楽器',       'sort_order' => 45],
            ['type' => 'expense', 'name' => '広報',         'sort_order' => 50],
            ['type' => 'expense', 'name' => 'スタッフ等謝礼', 'sort_order' => 60],
            ['type' => 'expense', 'name' => '交通費',       'sort_order' => 70],
            ['type' => 'expense', 'name' => '郵送費',       'sort_order' => 80],
            ['type' => 'expense', 'name' => 'その他雑費',   'sort_order' => 90],
        ];

        DB::table('categories')->upsert(
            $rows,
            ['type', 'name'],
            ['sort_order']
        );
    }
}
