<?php

namespace App\Http\Controllers;

use App\Models\Color;
use Illuminate\Http\Request;

class DashboardColorsController extends Controller
{
    // Fungsi untuk menampilkan daftar warna
    public function index()
    {
        // Ambil data warna dengan pagination
        $colors = Color::paginate(10);  // Sesuaikan angka 10 dengan jumlah item yang ingin ditampilkan per halaman
        return view('dashboard.colors.index', compact('colors'));
    }

    public function create()
    {
        return view('dashboard.colors.create');
    }


    // Fungsi untuk menyimpan data warna baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'color' => 'required|string|max:255'
        ]);

        // Menyimpan data warna
        Color::create([
            'color' => $request->color
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('dashboard-color.index')->with('pesan', 'Warna berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Cari data warna berdasarkan ID
        $color = Color::findOrFail($id);

        // Tampilkan halaman edit dengan data warna yang ditemukan
        return view('dashboard.colors.edit', compact('color'));
    }

    // Fungsi untuk update data warna
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'color' => 'required|string|max:255'
        ]);

        // Cari data warna berdasarkan ID dan update
        $color = Color::findOrFail($id);
        $color->update([
            'color' => $request->color
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard-color.index')->with('pesan', 'Warna berhasil diupdate!');
    }

    public function destroy($id)
    {
        // Cari data warna berdasarkan ID
        $color = Color::findOrFail($id);

        // Hapus data warna yang ditemukan
        $color->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard-color.index')->with('pesan', 'Warna berhasil dihapus!');
    }


}
