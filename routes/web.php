<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = \App\Models\Product::with('category')->get();
    return view('coffee', compact('products'));
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // 7-day Sales Trend (Fill in missing days to ensure a consistent chart)
        $salesData = collect(range(6, 0))->map(function ($days) {
            $date = now()->subDays($days)->format('Y-m-d');
            $total = \App\Models\Order::whereDate('order_date', $date)->sum('total_amount');
            return (object) [
                'date' => $date,
                'total' => $total
            ];
        });

        // Sales by Category
        $categoryData = \App\Models\OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name', \DB::raw('SUM(order_items.quantity * order_items.unit_price) as total'))
            ->groupBy('categories.name')
            ->get();

        $stats = [
            'total_sales' => \App\Models\Order::sum('total_amount'),
            'total_orders' => \App\Models\Order::count(),
            'total_customers' => \App\Models\Customer::count(),
            'total_products' => \App\Models\Product::count(),
        ];

        // Radar Chart Data: Store Performance Metrics
        $performanceData = [
            'labels' => ['Sales', 'Customer Satisfaction', 'Order Volume', 'Product Range', 'Average Basket'],
            'data' => [85, 92, 78, 95, 82]
        ];

        return view('dashboard', compact('salesData', 'categoryData', 'stats', 'performanceData'));
    })->name('dashboard');

    Route::get('/query-lab', [\App\Http\Controllers\QueryLabController::class, 'index'])->name('query-lab');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);
    Route::resource('suppliers', \App\Http\Controllers\SupplierController::class);
    Route::resource('orders', \App\Http\Controllers\OrderController::class);
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
    Route::get('sessions', [\App\Http\Controllers\SessionController::class, 'index'])->name('sessions.index');
});

require __DIR__.'/auth.php';
