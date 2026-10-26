<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'productname' => 'Coca Cola',
                'price'       => 3.55,
                'quantity'    => 450,
                'description' => 'Refreshing soft drink',
                'catid'       => 1,
            ],
            [
                'productname' => 'Fanta',
                'price'       => 8.55,
                'quantity'    => 1950,
                'description' => 'Popular soft drink',
                'catid'       => 1,
            ],
            [
                'productname' => 'ABC',
                'price'       => 8.99,
                'quantity'    => 950,
                'description' => 'Fresh whole milk',
                'catid'       => 3,
            ],
        ]);
    }
}