<?php

namespace App\Http\Controllers;

use App\Models\AgeCategory;
use App\Models\PriceCategory;
use App\Models\Promo;
use App\Models\UnitCategory;
use App\Models\User;
use Illuminate\Http\Request;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['promo'] = Promo::latest()->get();
        $data['user'] = User::latest()->get();
        return view('modules.backend.promo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['ageCategories'] = AgeCategory::where('is_active', 1)->get();
        $data['unitCategories'] = UnitCategory::where('is_active', 1)->get();
        $data['priceCategories'] = PriceCategory::where('is_active', 1)->get();
        return view('modules.backend.promo.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:promos,name',  // Pastikan nama promo unik di tabel promos
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',  // Menambahkan validasi numerik untuk harga
            'gender' => 'nullable|array',  // Memastikan gender adalah array
            'price_category' => 'nullable|exists:price_categories,id',  // Validasi relasi ke price_categories
            'unit_category' => 'nullable|exists:unit_categories,id',  // Validasi relasi ke unit_categories
            'age_categories' => 'nullable|array',  // Memastikan age_category adalah array
            'expired_date' => 'nullable|date',  // Validasi expired_date sebagai tanggal
            'show_price' => 'required|boolean',  // Validasi boolean untuk show_price
            'active_state' => 'required|boolean',  // Validasi boolean untuk active_state
        ]);

        $genders = json_encode($validated['gender'] ?? []);
        $ageCategories = json_encode($validated['age_categories'] ?? []);

        // Simpan data promo yang sudah tervalidasi
        Promo::create([
            'name' => $validated['name'],
            'image' => $validated['image'] ?? null,  // Menyimpan null jika image kosong
            'description' => $validated['description'] ?? null,  // Menyimpan null jika description kosong
            'price' => $validated['price'] ?? null,  // Menyimpan null jika price kosong
            'genders' => $genders,
            'price_category_id' => $validated['price_category'] ?? null,  // Menyimpan price_category jika ada
            'unit_category_id' => $validated['unit_category'] ?? null,  // Menyimpan unit_category jika ada
            'age_category_ids' => $ageCategories,
            'expired_at' => $validated['expired_date'] ?? null,  // Menyimpan null jika expired_date kosong
            'show_price' => $validated['show_price'],
            'active_state' => $validated['active_state'],
            'published_at' => now(),  // Set published_date ke tanggal hari ini
        ]);
        // Redirect dengan pesan sukses setelah berhasil menyimpan data
        return redirect('promo')->with('success', 'Data promo berhasil disimpan!');
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
        $data['ageCategories'] = AgeCategory::where('is_active', 1)->get();
        $data['unitCategories'] = UnitCategory::where('is_active', 1)->get();
        $data['priceCategories'] = PriceCategory::where('is_active', 1)->get();
        $data['promo'] = Promo::find($id);
        return view('modules.backend.promo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input dari form
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:promos,name',
            'image' => 'nullable|string',
            'description' => 'nullable|string',
            'price' => 'nullable|numeric',  // Menambahkan validasi numerik untuk harga
            'gender' => 'nullable|array',  // Memastikan gender adalah array
            'price_category' => 'nullable|exists:price_categories,id',  // Validasi relasi ke price_categories
            'unit_category' => 'nullable|exists:unit_categories,id',  // Validasi relasi ke unit_categories
            'age_categories' => 'nullable|array',  // Memastikan age_category adalah array
            'expired_date' => 'nullable|date',  // Validasi expired_date sebagai tanggal
            'show_price' => 'required|boolean',  // Validasi boolean untuk show_price
            'active_state' => 'required|boolean',  // Validasi boolean untuk active_state
        ]);

        $genders = json_encode($validated['gender'] ?? []);
        $ageCategories = json_encode($validated['age_categories'] ?? []);

        $item = Promo::find($id);
        // Simpan data promo yang sudah tervalidasi
        $item->update([
            'name' => $validated['name'],
            'image' => $validated['image'] ?? null,
            'description' => $validated['description'] ?? null,
            'price' => $validated['price'] ?? null,
            'price_category_id' => $validated['price_category'] ?? null,
            'unit_category_id' => $validated['unit_category'] ?? null,
            'age_category_ids' => $validated['age_category_ids'] ?? null,
            'expired_at' => $validated['expired_date'] ?? null,
            'show_price' => $validated['show_price'],
            'active_state' => $validated['active_state'],
            'published_at' => now(),  // Tetap diperbarui ke tanggal hari ini
        ]);
        // Redirect dengan pesan sukses setelah berhasil menyimpan data
        return redirect('promo')->with('success', 'Data promo berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $item = Promo::find($id);
        $item->delete();
        return redirect('promo')->with('success', 'Data Promo Berhasil dihapus');
    }
}
