<?php

namespace App\Http\Controllers;

use App\Models\AgeCategory;
use App\Models\User;
use Illuminate\Http\Request;

class AgeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //get posts
        $data['ageCategories'] = AgeCategory::latest()->get();
        $data['users'] = User::latest()->get();

        //render view with posts
        return view('modules.backend.age-categories.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.age-categories.create');
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

        AgeCategory::create($request->all());
        return redirect('age-categories')->with('success', 'Age Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgeCategory $ageCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgeCategory $ageCategory)
    {
        return view('modules.backend.age-categories.edit', compact('ageCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgeCategory $ageCategory)
    {
        $this->validate($request, [
            'name' => 'required',
            'is_active' => 'required',
        ]);

        $ageCategory->update($request->all());
        return redirect('age-categories')->with('success', 'Age Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgeCategory $ageCategory)
    {
        $ageCategory->delete();
        return redirect('age-categories')->with('success', 'Age Category deleted successfully.');
    }
}
