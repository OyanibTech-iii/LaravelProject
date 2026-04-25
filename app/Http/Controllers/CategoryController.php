<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = \App\Models\Category::select('categories.*');
            return \Yajra\DataTables\Facades\DataTables::of($categories)
                ->addColumn('action', function ($row) {
                    $editUrl = route('categories.edit', $row->id);
                    $deleteUrl = route('categories.destroy', $row->id);
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
                                <button type="submit" class="text-red-500 hover:text-red-700 transition-colors font-bold text-xs" onclick="return confirm(\'Are you sure you want to delete this category?\')">Delete</button>
                            </form>
                        </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('categories.index');
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
