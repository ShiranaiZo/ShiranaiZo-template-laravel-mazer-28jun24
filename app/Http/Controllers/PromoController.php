<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\promo;
use App\Models\AgeCategory;
use App\Models\PriceCategory;
use App\Models\UnitCategory;
class PromoController extends Controller
{
    public function index()
    {
        $promos = Promo::all();
        return view('modules.backend.promos.index', compact('promos'));
    }

    public function create()
    {   
        $ageCategories = AgeCategory::all();
        $priceCategories = PriceCategory::all();
        $unitCategories = UnitCategory::all();
        return view('modules.backend.promos.create', compact('ageCategories','priceCategories','unitCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|file',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
            'published_at' => 'nullable|date_format:Y-m-d\TH:i',
            'expired_at' => 'nullable|date_format:Y-m-d\TH:i',



            'price' => 'nullable|numeric|min:0',
            'show_price' => 'required|boolean',
            'genders' => 'required|array',
            'genders.*' => 'in:male,female',
            'age_category_id' => 'nullable|ulid',
            'price_category_id' => 'nullable|ulid',
            'unit_category_id' => 'nullable|ulid',
        ]);
        $data = $request->all();
        $data['genders'] = json_encode($request->genders); // Konversi ke JSON
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('promos', 'public');
        }
    
        Promo::create($data);
        return redirect()->route('promos.index')->with('success', 'Promo created successfully.');
    }

    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('modules.backend.promos.edit', compact('promo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'is_active' => 'required|boolean',
            'published_at' => 'nullable|date',
            'expired_at' => 'nullable|date',
            'price' => 'nullable|numeric|min:0',
            'show_price' => 'required|boolean',
            'genders' => 'nullable|json',
            'age_category_id' => 'nullable|ulid',
            'price_category_id' => 'nullable|ulid',
            'unit_category_id' => 'nullable|ulid',
        ]);

        $promo = Promo::findOrFail($id);
        $promo->update($request->all());
        return redirect()->route('promos.index')->with('success', 'Promo updated successfully.');
    }

    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);
        $promo->delete();
        return redirect()->route('promos.index')->with('success', 'Promo deleted successfully.');
    }
}
