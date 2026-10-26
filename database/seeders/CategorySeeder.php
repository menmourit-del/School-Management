<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            ['categoryname' => 'Soft drink', 'description' => 'new soft drink'],
            ['categoryname' => 'Beer', 'description' => 'new beer'],
            ['categoryname' => 'Milk', 'description' => 'new milk'],
            ['categoryname' => 'Drinks', 'description' => 'new soft drink'],
            ['categoryname' => 'Foods', 'description' => 'new foods'],
            ['categoryname' => 'Snacks', 'description' => 'new snacks'],
            ['categoryname' => 'Water', 'description' => 'new water'],
            ['categoryname' => 'Juice', 'description' => 'new juice'],
            ['categoryname' => 'Coffee', 'description' => 'new coffee'],
            ['categoryname' => 'Tea', 'description' => 'new tea'],
            ['categoryname' => 'Bakery', 'description' => 'new bakery'],
            ['categoryname' => 'Electronics', 'description' => 'new electronics'],
        ];

        foreach ($categories as $cat) {
            DB::table('categories')->insertOrIgnore([
                'categoryname' => $cat['categoryname'],
                'description'  => $cat['description'],
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}