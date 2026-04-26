<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class PastrySeeder extends Seeder
{
    public function run(): void
    {
        $pastryCategory = Category::where('name', 'Pastries')->first();
        $supplier = Supplier::first();

        if (!$pastryCategory || !$supplier) {
            return;
        }

        $pastries = [
            [
                'name' => 'Signature Cookie',
                'description' => 'Chunky chocolate chip delight',
                'price' => 85.00,
                'image_path' => 'assets/images/pastries/cookie.jfif',
            ],
            [
                'name' => 'Glazed Donut',
                'description' => 'Sweet and fluffy classic',
                'price' => 65.00,
                'image_path' => 'assets/images/pastries/donut.jfif',
            ],
            [
                'name' => 'Savory Empanada',
                'description' => 'Perfectly flaky crust with savory filling',
                'price' => 95.00,
                'image_path' => 'assets/images/pastries/empanada.jpg',
            ],
            [
                'name' => 'Mushroom Puff',
                'description' => 'Earthly flavors in artisan pastry',
                'price' => 110.00,
                'image_path' => 'assets/images/pastries/mushroom.jpg',
            ],
            [
                'name' => 'Cinnamon Roll',
                'description' => 'Spiced cinnamon with cream cheese glaze',
                'price' => 125.00,
                'image_path' => 'assets/images/pastries/sinamond rool.jfif',
            ],
            [
                'name' => 'Spanish Bread',
                'description' => 'Traditional Filipino sweet roll',
                'price' => 45.00,
                'image_path' => 'assets/images/pastries/spanish bread.jpg',
            ],
            [
                'name' => 'Yam Bread',
                'description' => 'Soft bread with sweet purple yam',
                'price' => 55.00,
                'image_path' => 'assets/images/pastries/yambread.jfif',
            ],
        ];

        foreach ($pastries as $pastry) {
            Product::create(array_merge($pastry, [
                'category_id' => $pastryCategory->id,
                'supplier_id' => $supplier->id,
                'stock_quantity' => rand(10, 50),
            ]));
        }
    }
}
