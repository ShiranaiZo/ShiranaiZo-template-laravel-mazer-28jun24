<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\AgeCategory;

class AgeCategoryController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $AgeCategories = AgeCategory::all();
        return view('modules.backend.Age_categories.index', compact('AgeCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.Age_categories.create');
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

        AgeCategory::create($request->all());

        return redirect()->route('age-categories.index')
            ->with('success', 'Age Category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AgeCategory $AgeCategory)
    {
        return view('modules.backend.Age_categories.show', compact('AgeCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AgeCategory $AgeCategory)
    {
        return view('modules.backend.Age_categories.edit', compact('AgeCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AgeCategory $AgeCategory)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'is_active' => 'required|boolean',
        ]);

        $AgeCategory->update($request->all());

        return redirect()->route('age-categories.index')
            ->with('success', 'Age Category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgeCategory $AgeCategory)
    {
        $AgeCategory->delete();

        return redirect()->route('age-categories.index')
            ->with('success', 'Age Category deleted successfully.');
    }
}
