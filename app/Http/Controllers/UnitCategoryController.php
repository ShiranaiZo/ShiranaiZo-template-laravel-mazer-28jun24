<?php

namespace App\Http\Controllers;

use App\Models\UnitCategory;
use Illuminate\Http\Request;

class UnitCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $unitCategories = UnitCategory::all();
        return view('modules.backend.unit_categories.index', compact('unitCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.unit_categories.create');
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
     * Display the specified resource.
     */
    public function show(UnitCategory $unitCategory)
    {
        return view('modules.backend.unit_categories.show', compact('unitCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitCategory $unitCategory)
    {
        return view('modules.backend.unit_categories.edit', compact('unitCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitCategory $unitCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $unitCategory->update($request->all());

        return redirect()->route('unit-categories.index')
            ->with('success', 'Unit Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitCategory $unitCategory)
    {
        $unitCategory->delete();

        return redirect()->route('modules.backend.unit_categories.index')
            ->with('success', 'Unit Category deleted successfully.');
    }
}
