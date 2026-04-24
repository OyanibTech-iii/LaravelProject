<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $customers = \App\Models\Customer::query();
            return \Yajra\DataTables\Facades\DataTables::of($customers)
                ->addColumn('customer', function ($row) {
                    $initials = substr($row->first_name, 0, 1) . substr($row->last_name, 0, 1);
                    $id = str_pad($row->id, 5, '0', STR_PAD_LEFT);
                    return '
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-brick/10 rounded-full flex items-center justify-center text-brick font-bold text-sm">
                                ' . $initials . '
                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-bold text-navy">' . $row->first_name . ' ' . $row->last_name . '</div>
                                <div class="text-xs text-gray-400">ID: #' . $id . '</div>
                            </div>
                        </div>';
                })
                ->addColumn('contact', function ($row) {
                    return '
                        <div class="text-xs text-gray-600">' . $row->email . '</div>
                        <div class="text-xs text-gray-400">' . $row->phone . '</div>';
                })
                ->addColumn('loyalty_points', function ($row) {
                    return '
                        <div class="inline-flex items-center px-3 py-1 rounded-full bg-yellow-50 border border-yellow-100">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-yellow-600 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span class="text-xs font-bold text-yellow-700">' . number_format($row->points) . ' pts</span>
                        </div>';
                })
                ->addColumn('joined_date', function ($row) {
                    return $row->created_at->format('M d, Y');
                })
                ->addColumn('action', function ($row) {
                    $editUrl = route('customers.edit', $row->id);
                    $deleteUrl = route('customers.destroy', $row->id);
                    $csrf = csrf_field();
                    $method = method_field('DELETE');
                    return '
                        <div class="flex justify-end gap-4">
                            <a href="' . $editUrl . '" 
                               @click.prevent="loadPage($el.href)"
                               class="text-brick hover:text-navy transition-colors font-bold">Edit</a>
                            <form action="' . $deleteUrl . '" method="POST" class="inline">
                                ' . $csrf . '
                                ' . $method . '
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors font-bold" onclick="return confirm(\'Are you sure you want to delete this customer?\')">Delete</button>
                            </form>
                        </div>';
                })
                ->rawColumns(['customer', 'contact', 'loyalty_points', 'action'])
                ->make(true);
        }

        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'points' => 'nullable|integer|min:0',
        ]);

        \App\Models\Customer::create($validated);

        return redirect()->route('customers.index')->with('success', 'Customer created successfully.');
    }

    public function edit(string $id)
    {
        $customer = \App\Models\Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        $customer = \App\Models\Customer::findOrFail($id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email,' . $id,
            'phone' => 'nullable|string|max:20',
            'points' => 'nullable|integer|min:0',
        ]);

        $customer->update($validated);

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully.');
    }

    public function destroy(string $id)
    {
        $customer = \App\Models\Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully.');
    }
}
