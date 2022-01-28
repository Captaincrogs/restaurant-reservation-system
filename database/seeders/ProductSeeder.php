<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        [    
            'id' => 1,
            'name' => 'cake',
            'description' => 'delicious cake',
            'category' => 'dessert',
            'price' => '100',   
        ],  
        [
            'id' => 2,
            'name' => 'ice cream',
            'description' => 'delicious ice cream',
            'category' => 'dessert',
            'price' => '100',
        ],
        [
            'id' => 3,
            'name' => 'pizza',
            'description' => 'delicious pizza',
            'category' => 'meal',
            'price' => '100',
        ],
        [   
            'id' => 4,
            'name' => 'burger',
            'description' => 'delicious burger',
            'category' => 'meal',
            'price' => '100',
        ],
        [
            'id' => 5,
            'name' => 'pasta',
            'description' => 'delicious pasta',
            'category' => 'meal',
            'price' => '100',
        ],
        [
            'id' => 6,
            'name' => 'salad',
            'description' => 'delicious salad',
            'category' => 'meal',
            'price' => '100',
        ],
        [
            'id' => 7,
            'name' => 'coffee',
            'description' => 'delicious coffee',
            'category' => 'drink',
            'price' => '100',
        ],
        [
            'id' => 8,
            'name' => 'tea',
            'description' => 'delicious tea',
            'category' => 'drink',
            'price' => '100',
        ],
        [
            'id' => 9,
            'name' => 'juice',
            'description' => 'delicious juice',
            'category' => 'drink',
            'price' => '100',
        ],
        [
            'id' => 10,
            'name' => 'milk',
            'description' => 'delicious milk',
            'category' => 'drink',
            'price' => '100',   
        ],
        
        ]);
    }
}
