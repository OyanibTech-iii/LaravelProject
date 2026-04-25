<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $orders = \App\Models\Order::with(['customer', 'user'])->select('orders.*');
            return \Yajra\DataTables\Facades\DataTables::of($orders)
                ->addColumn('customer_name', function ($row) {
                    return '<span class="text-xs text-navy font-bold">' . ($row->customer ? $row->customer->first_name . ' ' . $row->customer->last_name : 'Guest') . '</span>';
                })
                ->addColumn('staff_name', function ($row) {
                    return '<span class="text-xs text-gray-600">' . $row->user->name . '</span>';
                })
                ->addColumn('total_formatted', function ($row) {
                    return '<span class="text-xs font-bold text-navy">₱' . number_format($row->total_amount, 2) . '</span>';
                })
                ->addColumn('date_formatted', function ($row) {
                    return '<span class="text-[10px] text-gray-400">' . $row->order_date->format('M d, Y h:i A') . '</span>';
                })
                ->addColumn('status_badge', function ($row) {
                    $colors = [
                        'completed' => 'bg-green-500/10 text-green-600',
                        'pending' => 'bg-yellow-500/10 text-yellow-600',
                        'cancelled' => 'bg-red-500/10 text-red-600',
                    ];
                    $color = $colors[$row->status] ?? 'bg-gray-500/10 text-gray-600';
                    return '<span class="px-2 py-0.5 text-[10px] font-bold rounded-full ' . $color . '">' . ucfirst($row->status) . '</span>';
                })
                ->addColumn('action', function ($row) {
                    $showUrl = route('orders.show', $row->id);
                    return '
                        <div class="flex items-center justify-end gap-4">
                            <a href="' . $showUrl . '" 
                               @click.prevent="loadPage($el.href)"
                               class="text-brick hover:text-navy transition-colors font-bold text-xs">View Details</a>
                        </div>';
                })
                ->rawColumns(['customer_name', 'staff_name', 'total_formatted', 'date_formatted', 'status_badge', 'action'])
                ->make(true);
        }

        return view('orders.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
