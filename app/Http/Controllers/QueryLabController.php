<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryLabController extends Controller
{
    public function index(Request $request)
    {
        $activeIndex = (int) $request->query('scenario', 0);
        $activeTab = $request->query('tab', 'queries'); // 'queries' or 'normalization'
        
        // ... (existing scenario definitions)
        $scenario1 = [
            'title' => 'Selection & Projection',
            'description' => 'Find names and prices of products in the Coffee category where price > 150.',
            'sql' => "SELECT name, price FROM products WHERE price > 150 AND category_id = 1",
            'algebra' => 'π name, price (σ price > 150 ∧ category_id = 1 (products))',
            'results' => DB::select("SELECT name, price FROM products WHERE price > 150 AND category_id = 1")
        ];

        $scenario2 = [
            'title' => 'Cartesian Product',
            'description' => 'List customer names and their order amounts using a cross product condition.',
            'sql' => "SELECT customers.first_name, orders.total_amount FROM customers, orders WHERE customers.id = orders.customer_id",
            'algebra' => 'π first_name, total_amount (σ customers.id = orders.customer_id (customers × orders))',
            'results' => DB::select("SELECT customers.first_name, orders.total_amount FROM customers, orders WHERE customers.id = orders.customer_id")
        ];

        $scenario3 = [
            'title' => 'UNION Operation',
            'description' => 'Retrieve a unified list of contact emails from both Customers and Suppliers.',
            'sql' => "SELECT email FROM customers UNION SELECT email FROM suppliers",
            'algebra' => 'π email (customers) ∪ π email (suppliers)',
            'results' => DB::select("SELECT email FROM customers UNION SELECT email FROM suppliers")
        ];

        $scenario4 = [
            'title' => 'DIFFERENCE Operation',
            'description' => 'Find customers who have registered but never placed an order.',
            'sql' => "SELECT email FROM customers WHERE id NOT IN (SELECT customer_id FROM orders WHERE customer_id IS NOT NULL)",
            'algebra' => 'π email (customers) − π email (customers ⋈ orders)',
            'results' => DB::select("SELECT email FROM customers WHERE id NOT IN (SELECT customer_id FROM orders WHERE customer_id IS NOT NULL)")
        ];

        $scenarios = [$scenario1, $scenario2, $scenario3, $scenario4];

        $normalizationData = [
            '1NF' => [
                'title' => 'First Normal Form (1NF)',
                'rule' => 'Atomic values, no repeating groups, and unique primary keys.',
                'description' => 'In this stage, we ensure all attributes contain only atomic values. For IcedCoffee, we separate customer names into first and last names and ensure every table has a unique primary key (ID).',
                'tables' => [
                    ['name' => 'Products', 'columns' => 'id, name, description, price, stock_quantity, category_name, category_description, supplier_name, supplier_email'],
                    ['name' => 'Orders', 'columns' => 'id, customer_first_name, customer_last_name, order_date, total_amount, item_name, item_quantity, item_price']
                ]
            ],
            '2NF' => [
                'title' => 'Second Normal Form (2NF)',
                'rule' => 'Must be in 1NF and all non-key attributes must be fully functionally dependent on the primary key.',
                'description' => 'We remove partial dependencies. Product details shouldn\'t be in the same table as order dates. We split data into specialized tables: Products, Categories, Suppliers, and Orders.',
                'tables' => [
                    ['name' => 'Products', 'columns' => 'id, name, description, price, stock_quantity, category_id, supplier_id'],
                    ['name' => 'Categories', 'columns' => 'id, name, description'],
                    ['name' => 'Suppliers', 'columns' => 'id, name, email, phone'],
                    ['name' => 'Orders', 'columns' => 'id, customer_id, order_date, total_amount']
                ]
            ],
            '3NF' => [
                'title' => 'Third Normal Form (3NF)',
                'rule' => 'Must be in 2NF and no transitive dependencies (non-key attributes depend only on the primary key).',
                'description' => 'We ensure data integrity by removing columns that can be derived from others. In our 3NF schema, "subtotal" is removed from OrderItems because it can be calculated (Price x Quantity), ensuring absolute consistency.',
                'tables' => [
                    ['name' => 'OrderItems', 'columns' => 'id, order_id, product_id, quantity, unit_price'],
                    ['name' => 'Products', 'columns' => 'id, category_id, supplier_id, name, price, stock'],
                    ['name' => 'Orders', 'columns' => 'id, customer_id, user_id, order_date, total_amount']
                ]
            ]
        ];

        return view('query-lab', compact('scenarios', 'activeIndex', 'activeTab', 'normalizationData'));
    }
}
