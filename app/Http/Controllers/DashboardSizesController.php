<?php

namespace App\Http\Controllers;

use App\Models\Size;
use Illuminate\Http\Request;

class DashboardSizesController extends Controller
{
    /**
     * Display a listing of the sizes.
     */
    public function index(Request $request)
    {
        // Mengambil data ukuran dengan pagination
        $sizes = Size::paginate(10); // Sesuaikan angka 10 dengan jumlah yang diinginkan per halaman

        // Mengembalikan view dengan data ukuran
        return view('dashboard.sizes.index', [
            'sizes' => $sizes,
            'pesan' => $request->session()->get('pesan'), // Menangkap pesan dari session jika ada
        ]);
    }

    /**
     * Show the form for creating a new size.
     */
    public function create()
    {
        return view('dashboard.sizes.create');
    }

    /**
     * Store a newly created size in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'size' => 'required|numeric',
        ]);

        // Simpan ukuran baru ke database
        Size::create([
            'size' => $request->input('size'),
        ]);

        // Redirect ke halaman daftar ukuran dengan pesan sukses
        return redirect()->route('dashboard-sizes.index')->with('pesan', 'Ukuran berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified size.
     */
    public function edit($id)
{
    // Cari ukuran berdasarkan ID
    $size = Size::findOrFail($id);

    // Tampilkan view edit dan kirimkan data size
    return view('dashboard.sizes.edit', compact('size'));
}


    /**
     * Update the specified size in storage.
     */
    public function update(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'size' => 'required|numeric',
    ]);

    // Cari ukuran berdasarkan ID
    $size = Size::findOrFail($id);

    // Perbarui data ukuran dengan input dari form
    $size->update([
        'size' => $request->input('size'),
    ]);

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('dashboard-sizes.index')->with('pesan', 'Ukuran berhasil diperbarui');
}


    /**
     * Remove the specified size from storage.
     */
    public function destroy($id)
    {
        // Cari ukuran berdasarkan ID
        $size = Size::findOrFail($id);

        // Hapus data ukuran
        $size->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard-sizes.index')->with('pesan', 'Ukuran berhasil dihapus');
    }

}
