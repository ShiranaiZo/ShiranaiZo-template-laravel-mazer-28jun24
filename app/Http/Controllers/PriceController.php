<?php

namespace App\Http\Controllers;

use App\Models\PriceCategory;
use App\Models\User;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['priceCategory'] = PriceCategory::latest()->get();
        $data['users'] = User::latest()->get();
        return view('modules.backend.price-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.price-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:price_categories,name',
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'active_state' => 'required|boolean',
        ]);

        // Pastikan min lebih kecil dari max
        if ($validated['min'] >= $validated['max']) {
            return redirect()->back()
                ->withErrors(['min' => 'Nilai min harus lebih kecil dari nilai max.'])
                ->withInput();
        }

        // Simpan data ke database
        PriceCategory::create([
            'name' => $validated['name'],
            'min' => $validated['min'],
            'max' => $validated['max'],
            'is_active' => $validated['active_state'],
        ]);

        // Redirect dengan pesan sukses
        return redirect('price')->with('success', 'Data berhasil disimpan!');
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
        $data = PriceCategory::find($id);
        return view('modules.backend.price-category.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:price_categories,name,' . $id . ',id', // Pengecualian berdasarkan ID
            'min' => 'required|numeric',
            'max' => 'required|numeric',
            'active_state' => 'required|boolean',
        ]);

        // Pastikan min lebih kecil dari max
        if ($validated['min'] >= $validated['max']) {
            return redirect()->back()
                ->withErrors(['min' => 'Nilai min harus lebih kecil dari nilai max.'])
                ->withInput();
        }

        // Update data
        $item = PriceCategory::find($id);
        $item['name'] = $request->name;
        $item['min'] = $request->min;
        $item['max'] = $request->max;
        $item['is_active'] = $request->active_state;
        $item->save();

        // Redirect dengan pesan sukses
        return redirect('price')->with('success', 'Data berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = PriceCategory::find($id);
        $data->delete();
        return redirect('price')->with('success', 'data berhasil dihapus');
    }
}
