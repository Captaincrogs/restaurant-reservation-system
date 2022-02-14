<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('orders')->insert([
        [
            'user_id' => 1,
            'product_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'quantity' => 1,
        ],
        [
            'user_id' => 3,
            'product_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
            'quantity' => 2,
        ],
        ]);


    }
}
