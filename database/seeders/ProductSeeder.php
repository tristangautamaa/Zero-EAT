<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Tamagoyaki',
            'description' => 'Telur, Nori, Gula, Garam',
            'price' => 99000,
            'discount_price' => 89000,
            'image_url' => 'Tamagoyaki.jpg',
            'expiration_period' => '1 Minggu'
        ]);

        Product::create([
            'name' => 'Salmon Nigiri',
            'description' => 'Salmon, Nasi, Nori',
            'price' => 115000,
            'discount_price' => 99000,
            'image_url' => 'Nigiri.jpg',
            'expiration_period' => '3 Hari'
        ]);

        Product::create([
            'name' => 'Salmon Sashimi',
            'description' => 'Salmon Segar',
            'price' => 130000,
            'discount_price' => 115000,
            'image_url' => 'Sashimi.jpeg',
            'expiration_period' => '2 Hari'
        ]);
    }
}


