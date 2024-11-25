<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Merek;
use Illuminate\Http\Request;

class DashboardBrandController extends Controller
{
    public function index()
    {
        $brands = Brands::paginate(10); // Adjust the number as needed
        return view('dashboard.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('dashboard.brands.create');
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'nama_brand' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $brand = new Brands();
    $brand->nama_brand = $validatedData['nama_brand'];

    if ($request->hasFile('gambar')) {
        $originalImageName = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->storeAs('public/images/brands', $originalImageName);
        $brand->gambar = $originalImageName;
    }

    $brand->save();

    return redirect()->route('dashboard-brand.index')->with('pesan', 'Brand berhasil ditambahkan!');
}
    public function show($id)
    {
        $brand = Brands::findOrFail($id);
        return view('dashboard.brands.show', compact('brand'));
    }

    public function edit($id)
    {
        $brand = Brands::findOrFail($id);
        return view('dashboard.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama_brand' => 'required|string|max:255',
        'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $brand = Brands::findOrFail($id);
    $brand->nama_brand = $request->nama_brand;

    if ($request->hasFile('gambar')) {
        // Hapus gambar lama jika ada
        $oldImagePath = public_path('images/brands/' . $brand->gambar);
        if ($brand->gambar && file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

        // Simpan gambar baru dengan nama asli
        $originalImageName = $request->file('gambar')->getClientOriginalName();
        $request->file('gambar')->move(public_path('images/brands'), $originalImageName);

        // Simpan hanya nama file asli ke database
        $brand->gambar = $originalImageName;
    }

    $brand->save();

    return redirect()->route('dashboard-brand.index')->with('pesan', 'Brand berhasil diupdate!');
}



    public function destroy($id)
    {
        $brand = Brands::findOrFail($id);
        $brand->delete();

        return redirect()->route('dashboard-brand.index')->with('pesan', 'Brand berhasil dihapus!');
    }
}
