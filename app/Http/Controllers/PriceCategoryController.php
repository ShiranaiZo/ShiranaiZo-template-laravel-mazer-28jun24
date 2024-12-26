<?php

namespace App\Http\Controllers;

use App\Models\PriceCategory;
use Illuminate\Http\Request;

class PriceCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priceCategories = PriceCategory::all();
        return view('modules.backend.price_categories.index', compact('priceCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.price_categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min' => 'required|integer|min:0',
            'max' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        PriceCategory::create($request->all());

        return redirect()->route('price-categories.index')
            ->with('success', 'Price Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceCategory $priceCategory)
    {
        return view('modules.backend.price_categories.show', compact('priceCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceCategory $PriceCategory)
    {
        return view('modules.backend.price_categories.edit', compact('PriceCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PriceCategory $PriceCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'min' => 'required|integer|min:0',
            'max' => 'required|integer|min:0',
            'is_active' => 'required|boolean',
        ]);

        $PriceCategory->update($request->all());

        return redirect()->route('price-categories.index')
            ->with('success', 'Price Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PriceCategory $PriceCategory)
    {
        $PriceCategory->delete();

        return redirect()->route('price-categories.index')
            ->with('success', 'Price Category deleted successfully.');
    }
}
