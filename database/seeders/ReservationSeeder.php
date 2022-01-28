<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reservations')->insert([

            'id' => 1,
            'user_id' => '1',
            'message' => 'delicious meal',
            'date' => '2020-12-24',
            'time' => '12:00',
            'people' => '2',
            'status' => 'pending',

        ]);
    
    }
}
