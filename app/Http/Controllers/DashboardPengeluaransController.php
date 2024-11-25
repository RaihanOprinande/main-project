<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Pengeluaran;
use App\Models\Sepatu;
use App\Models\Size;
use Illuminate\Http\Request;

class DashboardPengeluaransController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $query = Pengeluaran::query();

    // if ($request->filled('kategori_id')) {
    //     $query->where('kategori_id', $request->kategori_id);
    // }

    if ($request->filled('date')) {
        $query->where('date', $request->date);
    }

    // Hitung total pengeluaran berdasarkan semua data yang diambil
    $total = $query->sum('harga');
    $pengeluarans = Pengeluaran::with('size','brand','kategori')->paginate(10);
    $tanggal = Pengeluaran::latest()->paginate(10);

    // Return view dengan data yang diperlukan
    return view('dashboard.pengeluarans.index', compact( 'total','pengeluarans','tanggal'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sepatus = Sepatu::all();
        $brands = Brands::all();
        $sizes = Size::all();
        $categories = Kategori::all();
        return view('dashboard.pengeluarans.create',compact('sepatus','brands','sizes','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'sepatu' => 'required',
            'size_id' => 'required',
            'brand_id' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'quantity' => 'required',
            'date' => 'required',
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
    // $sepatus = Sepatu::all();
    $brands = Brands::all();
    $sizes = Size::all();
    $categories = Kategori::all();

    // Tampilkan view edit dengan data pengeluaran
    return view('dashboard.pengeluarans.edit', compact('pengeluaran','brands','sizes','categories'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $validated = $request->validate([
            'sepatu' => 'required',
            'size_id' => 'required',
            'brand_id' => 'required',
            'kategori_id' => 'required',
            'harga' => 'required',
            'quantity' => 'required',
            'date' => 'required',
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
