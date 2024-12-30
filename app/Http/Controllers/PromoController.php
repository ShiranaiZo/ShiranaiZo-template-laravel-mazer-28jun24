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
            'age_category' => 'nullable|array',  // Memastikan age_category adalah array
            'expired_date' => 'nullable|date',  // Validasi expired_date sebagai tanggal
            'show_price' => 'required|boolean',  // Validasi boolean untuk show_price
            'active_state' => 'required|boolean',  // Validasi boolean untuk active_state
        ]);

        // Simpan data promo yang sudah tervalidasi
        Promo::create([
            'name' => $validated['name'],
            'image' => $validated['image'] ?? null,  // Menyimpan null jika image kosong
            'description' => $validated['description'] ?? null,  // Menyimpan null jika description kosong
            'price' => $validated['price'] ?? null,  // Menyimpan null jika price kosong
            'genders' => implode(',', $validated['gender'] ?? []),  // Mengubah array gender menjadi string yang dipisahkan koma
            'price_category_id' => $validated['price_category'] ?? null,  // Menyimpan price_category jika ada
            'unit_category_id' => $validated['unit_category'] ?? null,  // Menyimpan unit_category jika ada
            'age_category_ids' => implode(',', $validated['age_category'] ?? []),  // Mengubah array age_category menjadi string yang dipisahkan koma
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
