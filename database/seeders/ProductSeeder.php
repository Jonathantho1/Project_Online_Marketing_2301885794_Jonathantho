<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'name' => 'Samsung QA75Q95T',
            'description' => '75 inch Smart TV QLED 4K UHD',
            'price' => 14739000,
            'category_id' => 1,
            'photo' => 'Samsung QA75Q95T.jpg',
        ]);

        Product::create([
            'name' => 'Iphone XS',
            'description' => 'Features 5.8" display, Apple A12 Bionic chipset',
            'price' => 4845000,
            'category_id' => 2,
            'photo' => 'Iphone 11.jpg',
        ]);
        
        Product::create([
            'name' => 'ASUS ROG Zephyrus G14',
            'description' => '14 inch FHD, 16BG DDR4, 1TB, AMD Ryzen 4800HS, NVIDIA GeForce GTX1650',
            'price' => 21000000,
            'category_id' => 3,
            'photo' => 'ASUS ROG Zephyrus G14.jpg',
        ]);

    }
}
