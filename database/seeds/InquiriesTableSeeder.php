<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Inquiry;

class InquiriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            Inquiry::create([
                'user_id'    => $i,
                'admin_id'   => 1,
                'inquiry'    => 'これはテスト投稿' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Inquiry::create([
                'user_id'    => 1,
                'admin_id'   => $i,
                'inquiry'    => 'これはテスト投稿2-' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Inquiry::create([
                'user_id'    => $i,
                'admin_id'   => 1,
                'reply'      => 'テスト返信投稿1-' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            Inquiry::create([
                'user_id'    => 1,
                'admin_id'   => $i,
                'reply'      => 'テスト返信投稿2-' .$i,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
