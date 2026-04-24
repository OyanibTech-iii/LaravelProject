<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $products = \App\Models\Product::with('category')->get();
    return view('coffee', compact('products'));
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        // 7-day Sales Trend
        $salesData = \App\Models\Order::select(
            \DB::raw('DATE(order_date) as date'),
            \DB::raw('SUM(total_amount) as total')
        )
        ->where('order_date', '>=', now()->subDays(7))
        ->groupBy('date')
        ->orderBy('date')
        ->get();

        // Sales by Category
        $categoryData = \App\Models\OrderItem::join('products', 'order_items.product_id', '=', 'products.id')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->select('categories.name', \DB::raw('SUM(order_items.subtotal) as total'))
            ->groupBy('categories.name')
            ->get();

        $stats = [
            'total_sales' => \App\Models\Order::sum('total_amount'),
            'total_orders' => \App\Models\Order::count(),
            'total_customers' => \App\Models\Customer::count(),
            'total_products' => \App\Models\Product::count(),
        ];

        return view('dashboard', compact('salesData', 'categoryData', 'stats'));
    })->name('dashboard');

    Route::get('/query-lab', [\App\Http\Controllers\QueryLabController::class, 'index'])->name('query-lab');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('products', \App\Http\Controllers\ProductController::class);
    Route::resource('customers', \App\Http\Controllers\CustomerController::class);
});

require __DIR__.'/auth.php';
