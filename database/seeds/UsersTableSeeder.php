<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i<=10; $i++){
            User::create([
                'name' =>'test_user' .$i,
                'email' => 'test'.$i.'@test',
                'password' => Hash::make('12345678'),
                'email_verified_at' => now(),
                'remember_token' => str_random(10),
                'created_at'     => now(),
                'updated_at'     => now(),
                'address' => '愛知県名古屋市〇〇'.$i,
                'c_name' => 'test株式会社' .$i,
                'phone' => 1234567890,
            ]);
        }
    }
}
