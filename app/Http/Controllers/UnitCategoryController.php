<?php

namespace App\Http\Controllers;

use App\Models\UnitCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UnitCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['unitCategories'] = UnitCategory::latest()->get();
        $data['users'] = User::latest()->get();
        return view('modules.backend.unit-categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.unit-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        UnitCategory::create($request->all());

        return redirect()->route('unit-categories.index')
            ->with('success', 'Unit Category created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = UnitCategory::find($id);
        return view('modules.backend.unit-categories.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);
        $data = UnitCategory::find($id);
        $data->update($request->all());

        return redirect()->route('unit-categories.index')
            ->with('success', 'Unit Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = UnitCategory::find($id);
        $data->delete();

        return redirect()->route('unit-categories.index')
            ->with('success', 'Unit Category deleted successfully.');
    }
}
