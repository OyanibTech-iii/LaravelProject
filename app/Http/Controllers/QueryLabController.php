<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryLabController extends Controller
{
    public function index(Request $request)
    {
        $activeIndex = (int) $request->query('scenario', 0);
        
        // 1. Selection with AND, OR, NOT & Projection
        $scenario1 = [
            'title' => 'Selection & Projection',
            'description' => 'Find names and prices of products in the Coffee category where price > 150.',
            'sql' => "SELECT name, price FROM products WHERE price > 150 AND category_id = 1",
            'algebra' => 'π name, price (σ price > 150 ∧ category_id = 1 (products))',
            'results' => DB::select("SELECT name, price FROM products WHERE price > 150 AND category_id = 1")
        ];

        // 2. Cartesian Product with conditions (Manual Join)
        $scenario2 = [
            'title' => 'Cartesian Product',
            'description' => 'List customer names and their order amounts using a cross product condition.',
            'sql' => "SELECT customers.first_name, orders.total_amount FROM customers, orders WHERE customers.id = orders.customer_id",
            'algebra' => 'π first_name, total_amount (σ customers.id = orders.customer_id (customers × orders))',
            'results' => DB::select("SELECT customers.first_name, orders.total_amount FROM customers, orders WHERE customers.id = orders.customer_id")
        ];

        // 3. UNION
        $scenario3 = [
            'title' => 'UNION Operation',
            'description' => 'Retrieve a unified list of contact emails from both Customers and Suppliers.',
            'sql' => "SELECT email FROM customers UNION SELECT email FROM suppliers",
            'algebra' => 'π email (customers) ∪ π email (suppliers)',
            'results' => DB::select("SELECT email FROM customers UNION SELECT email FROM suppliers")
        ];

        // 4. DIFFERENCE
        $scenario4 = [
            'title' => 'DIFFERENCE Operation',
            'description' => 'Find customers who have registered but never placed an order.',
            'sql' => "SELECT email FROM customers WHERE id NOT IN (SELECT customer_id FROM orders WHERE customer_id IS NOT NULL)",
            'algebra' => 'π email (customers) − π email (customers ⋈ orders)',
            'results' => DB::select("SELECT email FROM customers WHERE id NOT IN (SELECT customer_id FROM orders WHERE customer_id IS NOT NULL)")
        ];

        $scenarios = [$scenario1, $scenario2, $scenario3, $scenario4];

        return view('query-lab', compact('scenarios', 'activeIndex'));
    }
}
