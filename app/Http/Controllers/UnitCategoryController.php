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
        //
        $data['unitCategories'] = UnitCategory::latest()->get();
        $data['users'] = User::latest()->get();

        //render view with posts
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
        $this->validate($request, [
            'name' => 'required',
            'is_active' => 'required',
            // 'created_by_id' => 'required',
            // 'updated_by_id' => 'required'
        ]);

        UnitCategory::create($request->all());
        return redirect('unit-categories')->with('success', 'Unit Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(UnitCategory $unitCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UnitCategory $unitCategory)
    {
        return view('modules.backend.unit-categories.edit', compact('unitCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UnitCategory $unitCategory)
    {
        $this->validate($request, [
            'name' => 'required',
            'is_active' => 'required',
        ]);

        $unitCategory->update($request->all());
        return redirect('unit-categories')->with('success', 'Unit Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UnitCategory $unitCategory)
    {
        $unitCategory->delete();
        return redirect('unit-categories')->with('success', 'Unit Category deleted successfully.');
    }
}
