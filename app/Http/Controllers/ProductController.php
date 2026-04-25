<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $products = \App\Models\Product::with(['category', 'supplier'])->select('products.*');
            return \Yajra\DataTables\Facades\DataTables::of($products)
                ->addColumn('product', function ($row) {
                    $initial = substr($row->name, 0, 1);
                    $description = \Illuminate\Support\Str::limit($row->description, 30);
                    return '
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-8 w-8 bg-cream rounded-lg flex items-center justify-center text-brick font-bold text-xs">
                                ' . $initial . '
                            </div>
                            <div class="ml-4">
                                <div class="text-xs font-bold text-navy">' . $row->name . '</div>
                                <div class="text-[10px] text-gray-400">' . $description . '</div>
                            </div>
                        </div>';
                })
                ->addColumn('category', function ($row) {
                    return '
                        <span class="px-2 py-0.5 text-[10px] font-bold rounded-full bg-navy/5 text-navy">
                            ' . $row->category->name . '
                        </span>';
                })
                ->addColumn('price_formatted', function ($row) {
                    return '<span class="text-xs text-gray-600 font-medium">₱' . number_format($row->price, 2) . '</span>';
                })
                ->addColumn('stock', function ($row) {
                    $color = $row->stock_quantity > 10 ? 'bg-green-500' : 'bg-red-500';
                    return '
                        <div class="flex items-center gap-2">
                            <div class="w-1.5 h-1.5 rounded-full ' . $color . '"></div>
                            <span class="text-xs font-medium text-gray-600">' . $row->stock_quantity . ' units</span>
                        </div>';
                })
                ->addColumn('supplier_name', function ($row) {
                    return '<span class="text-xs text-gray-600">' . $row->supplier->name . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('products.edit', $row->id);
                    $deleteUrl = route('products.destroy', $row->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    return '
                        <div class="flex items-center justify-end gap-4">
                            <a href="' . $editUrl . '" 
                               @click.prevent="loadPage($el.href)"
                               class="text-brick hover:text-navy transition-colors font-bold text-xs">Edit</a>
                            <form action="' . $deleteUrl . '" method="POST" class="flex items-center">
                                ' . $csrf . '
                                ' . $method . '
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors font-bold text-xs" onclick="return confirm(\'Are you sure you want to delete this product?\')">Delete</button>
                            </form>
                        </div>';
                })
                ->rawColumns(['product', 'category', 'price_formatted', 'stock', 'supplier_name', 'action'])
                ->make(true);
        }

        return view('products.index');
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        $suppliers = \App\Models\Supplier::all();
        return view('products.create', compact('categories', 'suppliers'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        \App\Models\Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(string $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $categories = \App\Models\Category::all();
        $suppliers = \App\Models\Supplier::all();
        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    public function update(Request $request, string $id)
    {
        $product = \App\Models\Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'supplier_id' => 'required|exists:suppliers,id',
            'price' => 'required|numeric|min:0',
            'stock_quantity' => 'required|integer|min:0',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string',
        ]);

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = \App\Models\Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
