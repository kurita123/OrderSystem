<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Cart;

class CartsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            Cart::create([
                'user_id' => 1,
                'product_id' => 2,
                'stock' => 3,
                'admin_id' =>1,
                'datetime' => '2020-07-28'
            ]);

            Cart::create([
                'user_id' => 1,
                'product_id' => 6,
                'stock' => 8,
                'admin_id' =>1,
                'datetime' => '2020-07-23'
            ]);

            Cart::create([
                'user_id' => 1,
                'product_id' => 4,
                'stock' => 22,
                'admin_id' =>1,
                'datetime' => '2020-07-18'
            ]);

            Cart::create([
                'user_id' => 1,
                'product_id' => 8,
                'stock' => 6,
                'admin_id' =>1,
                'datetime' => '2020-07-11'
            ]);

            Cart::create([
                'user_id' => 1,
                'product_id' => 1,
                'stock' => 3,
                'admin_id' =>1,
                'datetime' => '2020-07-02'
            ]);

            Cart::create([
                'user_id' => 1,
                'product_id' => 2,
                'stock' => 8,
                'admin_id' =>1,
                'datetime' => '2020-07-05'
            ]);

            Cart::create([
                'user_id' => 2,
                'product_id' => 13,
                'stock' => 3,
                'admin_id' =>2,
                'datetime' => '2020-07-24'
            ]);

            Cart::create([
                'user_id' => 2,
                'product_id' => 11,
                'stock' => 5,
                'admin_id' =>2,
                'datetime' => '2020-07-08'
            ]);

            Cart::create([
                'user_id' => 2,
                'product_id' => 12,
                'stock' => 11,
                'admin_id' =>2,
                'datetime' => '2020-07-11'
            ]);

            Cart::create([
                'user_id' => 2,
                'product_id' => 12,
                'stock' => 6,
                'admin_id' =>1,
                'datetime' => '2020-07-05'
            ]);

            Cart::create([
                'user_id' => 3,
                'product_id' => 2,
                'stock' => 4,
                'admin_id' =>1,
                'datetime' => '2020-07-15'
            ]);

            Cart::create([
                'user_id' => 3,
                'product_id' => 2,
                'stock' => 8,
                'admin_id' =>1,
                'datetime' => '2020-07-25'
            ]);
        }
}
