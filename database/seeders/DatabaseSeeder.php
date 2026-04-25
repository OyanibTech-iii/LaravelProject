<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $admin = User::factory()->create([
            'name' => 'Admin Staff',
            'email' => 'admin@icedcoffee.com',
            'password' => bcrypt('password'),
        ]);

        $coffeeCategory = \App\Models\Category::create([
            'name' => 'Coffee',
            'description' => 'Artisan specialty coffee brews.',
        ]);

        $pastryCategory = \App\Models\Category::create([
            'name' => 'Pastries',
            'description' => 'Freshly baked morning treats.',
        ]);

        $supplier = \App\Models\Supplier::create([
            'name' => 'Bean Source Co.',
            'contact_person' => 'John Bean',
            'email' => 'john@beansource.com',
            'phone' => '123456789',
            'address' => '123 Coffee Valley',
        ]);

        $product1 = \App\Models\Product::create([
            'category_id' => $coffeeCategory->id,
            'supplier_id' => $supplier->id,
            'name' => 'Classic Espresso',
            'description' => 'Rich, bold, and creamy',
            'price' => 145.00,
            'stock_quantity' => 100,
        ]);

        $product2 = \App\Models\Product::create([
            'category_id' => $coffeeCategory->id,
            'supplier_id' => $supplier->id,
            'name' => 'Cold Brew Reserve',
            'description' => 'Steeped for 18 hours',
            'price' => 195.00,
            'stock_quantity' => 50,
        ]);

        $customer1 = \App\Models\Customer::create([
            'first_name' => 'Alice',
            'last_name' => 'Smith',
            'email' => 'alice@example.com',
            'phone' => '999888777',
            'points' => 10,
        ]);

        $customer2 = \App\Models\Customer::create([
            'first_name' => 'Bob',
            'last_name' => 'Jones',
            'email' => 'bob@example.com',
            'phone' => '111222333',
            'points' => 0,
        ]);

        // Alice has an order, Bob doesn't (to test DIFFERENCE)
        $order = \App\Models\Order::create([
            'customer_id' => $customer1->id,
            'user_id' => $admin->id,
            'order_date' => now(),
            'total_amount' => 145.00,
            'status' => 'completed',
        ]);

        \App\Models\OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product1->id,
            'quantity' => 1,
            'unit_price' => 145.00,
        ]);
    }
}
