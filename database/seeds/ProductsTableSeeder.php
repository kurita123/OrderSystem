<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => '人参',
            'price' => 120,
            'amount' => '500g',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => '玉ねぎ',
            'price' => 150,
            'amount' => '1kg',
            'stocks' => 200,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'キャベツ',
            'price' => 80,
            'amount' => '2kg',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'レタス',
            'price' => 100,
            'amount' => '300g',
            'stocks' => 50,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => '青ネギ',
            'price' => 100,
            'amount' => '100g',
            'stocks' => 80,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => '長ネギ',
            'price' => 150,
            'amount' => '200g',
            'stocks' => 30,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'じゃがいも',
            'price' => 140,
            'amount' => '700g',
            'stocks' => 55,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'きゅうり',
            'price' => 80,
            'amount' => '350g',
            'stocks' => 64,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'アスパラ',
            'price' => 90,
            'amount' => '100g',
            'stocks' => 30,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'もやし',
            'price' => 20,
            'amount' => '500g',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ボルト5',
            'price' => 200,
            'amount' => '20本',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ボルト8',
            'price' => 250,
            'amount' => '20本',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ボルト10',
            'price' => 300,
            'amount' => '20本',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ボルト15',
            'price' => 350,
            'amount' => '20本',
            'stocks' => 50,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ナット5',
            'price' => 200,
            'amount' => '20個',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ナット8',
            'price' => 250,
            'amount' => '20個',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ナット10',
            'price' => 300,
            'amount' => '20個',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 2,
            'product' => 'ナット',
            'price' => 350,
            'amount' => '20個',
            'stocks' => 100,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'レンチ',
            'price' => 1000,
            'amount' => '1個',
            'stocks' => 10,
        ]);

        DB::table('products')->insert([
            'admin_id' => 1,
            'product' => 'ドライバー',
            'price' => 500,
            'amount' => '1個',
            'stocks' => 10,
        ]);
    }
}
