<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    public function run(): void
    {
        $products = [
            [
                'name' => 'Signature Iced Coffee',
                'description' => 'Our classic brew served over crystal clear ice cubes.',
                'price' => 140,
                'stock_quantity' => 50,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/Iced Coffee Drinks With Ice Cubes.jfif'
            ],
            [
                'name' => 'Classic Bubble Tea',
                'description' => 'Authentic milk tea with chewy tapioca pearls.',
                'price' => 120,
                'stock_quantity' => 40,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/Drink Bubble Tea.jfif'
            ],
            [
                'name' => 'Premium Matcha Latte',
                'description' => 'Ceremonial grade matcha whisked to perfection.',
                'price' => 160,
                'stock_quantity' => 30,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/Matcha.jfif'
            ],
            [
                'name' => 'Strawberry Cream Matcha',
                'description' => 'Sweet strawberries topped with creamy matcha.',
                'price' => 180,
                'stock_quantity' => 25,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/Strawberry Cream Matcha.jfif'
            ],
            [
                'name' => 'Blueberry Artisan Slush',
                'description' => 'Refreshing wild blueberries blended to perfection.',
                'price' => 150,
                'stock_quantity' => 20,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/blueberry-slush.jfif'
            ],
            [
                'name' => 'Pure Black Coffee',
                'description' => 'Simple, bold, and invigorating black coffee.',
                'price' => 100,
                'stock_quantity' => 100,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/plain.jfif'
            ],
            [
                'name' => 'Blackberry Smoothie',
                'description' => 'Fresh blackberries blended into a smooth delight.',
                'price' => 155,
                'stock_quantity' => 15,
                'category_id' => 1,
                'supplier_id' => 1,
                'image_path' => 'assets/images/blackberry.jfif'
            ],
        ];

        foreach ($products as $productData) {
            Product::updateOrCreate(
                ['name' => $productData['name']],
                $productData
            );
        }
    }
}
