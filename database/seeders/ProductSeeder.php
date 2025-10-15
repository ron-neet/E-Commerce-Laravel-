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
                'name' => 'Smartphone',
                'price' => '50000',
                'category' => 'Electronics',
                'description' => 'Latest model smartphone with high-resolution camera',
                'images' => 'https://cdn-icons-png.flaticon.com/512/2748/2748558.png'
            ],
            [
                'name' => 'Laptop',
                'price' => '120000',
                'category' => 'Electronics',
                'description' => 'Powerful laptop for work and gaming',
                'images' => 'https://cdn-icons-png.flaticon.com/512/179/179386.png'
            ],
            [
                'name' => 'Refrigerator',
                'price' => '90000',
                'category' => 'Appliances',
                'description' => 'Energy-efficient refrigerator with spacious compartments',
                'images' => 'https://cdn-icons-png.flaticon.com/512/3075/3075977.png'
            ],
            [
                'name' => 'Microwave Oven',
                'price' => '25000',
                'category' => 'Appliances',
                'description' => 'Quick-cooking microwave oven with multiple modes',
                'images' => 'https://cdn-icons-png.flaticon.com/512/3082/3082026.png'
            ],
            [
                'name' => 'Headphones',
                'price' => '12000',
                'category' => 'Accessories',
                'description' => 'Noise-cancelling wireless headphones',
                'images' => 'https://cdn-icons-png.flaticon.com/512/727/727240.png'
            ]
        ]);

    }
}
