<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(InquiriesTableSeeder::class);
        $this->call(CartsTableSeeder::class);
    }
}
