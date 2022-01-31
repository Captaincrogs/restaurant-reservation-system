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
            'name' => 'John Doe',
            'email' => 'Jhon@doe.com',
            'user_id' => 1,
            'product_id' => 1,
            'reservation_id' => 1,
        ],
        [
            'name' => 'John Doe',
            'email' => 'Jhon@doe.com',
            'user_id' => 1,
            'product_id' => 1,
            'reservation_id' => 1,
        ],
        [

            'name' => 'stroopWafel',
            'email' => 'stroopwafel@koeki.com',
            'user_id' => 2,
            'product_id' => 2,
            'reservation_id' => 2,
        ],
        [
    
            'name' => 'stroopWafel',
            'email' =>  'stroopwafel@koeki.com',
            'user_id' => 2,
            'product_id' => 2,
            'reservation_id' => 2,
        ],
                ]);


    }
}
