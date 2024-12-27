<?php

namespace App\Http\Controllers;

use App\Models\UnitCategory;
use App\Models\User;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['unitCategory'] = UnitCategory::latest()->get();
        $data['users'] = User::latest()->get();
        return view('modules.backend.unit-category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('modules.backend.unit-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:unit_categories,name',
            'active_state' => 'required',
        ]);

        // Simpan data
        UnitCategory::create([
            'name' => $validated['name'],
            'is_active' => $validated['active_state'],
        ]);

        // Redirect dengan pesan sukses
        return redirect('unit')->with('success', 'Data berhasil disimpan!');
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
        $data = UnitCategory::find($id);
        return view('modules.backend.unit-category.edit', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
                // Validasi data
            $validated = $request->validate([
                'name' => 'required|string|max:255|unique:unit_categories,name,' . $id,
                'active_state' => 'required'
            ]);

            // Cari data berdasarkan ID
            $item = UnitCategory::find($id);

            // Update data
            $item['name'] = $request->name;
            $item['is_active'] = $request->active_state;
            $item->save();

            // Redirect atau kembalikan respons
            return redirect('unit')->with('success', 'Data berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = UnitCategory::find($id);
        $data->delete();
        return redirect('unit')->with('success', 'Data berhasil dihapus');
    }
}
