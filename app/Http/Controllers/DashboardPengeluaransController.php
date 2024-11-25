<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DashboardPengeluaransController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    // Ambil query pencarian dari input
    $search = $request->input('search');

    // Query data dengan filter pencarian jika ada
    $pengeluarans = Pengeluaran::when($search, function ($query, $search) {
        return $query->where('sepatu', 'like', "%{$search}%")
            ->orWhere('brand', 'like', "%{$search}%")
            ->orWhere('kategori', 'like', "%{$search}%");
    })->paginate(10);

    // Hitung total pengeluaran berdasarkan semua data yang diambil
    $total = $pengeluarans->sum(function ($pengeluaran) {
        return $pengeluaran->harga * $pengeluaran->quantity;
    });

    // Return view dengan data yang diperlukan
    return view('dashboard.pengeluarans.index', compact('pengeluarans', 'total'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengeluarans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'sepatu' => 'required|string|max:255',
            'size' => 'required|integer|min:30|max:50',
            'brand' => 'required|string|max:255',
            'kategori' => 'required|string|in:Casual,Sport,Formal',
            'harga' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        // Simpan data ke database
        Pengeluaran::create($request->all());

        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    // Ambil data pengeluaran berdasarkan ID
    $pengeluaran = Pengeluaran::findOrFail($id);

    // Tampilkan view edit dengan data pengeluaran
    return view('dashboard.pengeluarans.edit', compact('pengeluaran'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'sepatu' => 'required|string|max:255',
            'size' => 'required|integer|min:30|max:50',
            'brand' => 'required|string|max:255',
            'kategori' => 'required|string|max:50',
            'harga' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        // Cari data pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Update data pengeluaran dengan data yang divalidasi
        $pengeluaran->update($validated);

        // Redirect ke halaman daftar pengeluaran dengan pesan sukses
        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function show($id)
    {
        // Cari data pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Tampilkan halaman show dengan data pengeluaran
        return view('dashboard.pengeluarans.show', compact('pengeluaran'));
    }
    public function destroy($id)
    {
        // Cari data pengeluaran berdasarkan ID
        $pengeluaran = Pengeluaran::findOrFail($id);

        // Hapus data pengeluaran
        $pengeluaran->delete();

        // Redirect ke halaman daftar pengeluaran dengan pesan sukses
        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil dihapus!');
    }

}
