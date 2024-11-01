<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sepatu;
use App\Models\Merek;
use App\Models\Size;

class SepatuController extends Controller
{
    public function index()
    {
        $mereks = Merek::all(); // Mengambil semua data merek
        $sepatus = Sepatu::all(); // Mengambil semua data sepatu
        $sizes = Size::all();

    return view('home', compact('mereks', 'sepatus', 'sizes'));
    }
    public function show($id) {
        $sepatu = Sepatu::find($id);
        $sizes = Size::all();
        $kode_sepatu = Sepatu::find('kode_sepatu');
        $stocks = Sepatu::with(['gambar', 'kategori', 'color', 'merek'])->get();
        // $sepatus = Sepatu::with(['size'])->find('$id');
        return view('sepatu.detail', compact('sepatu','stocks','sizes','kode_sepatu'));
    }
    public function aboutus()
    {
        $aboutus = Sepatu::all(); // Ambil semua data sepatu
        return view('sepatu.aboutus', compact('aboutus'));
    }



public function filterByKategori($kategori)
{
    // Ambil data sepatu berdasarkan kategori yang dipilih
    $sepatus = Sepatu::where('kategori_id', $kategori)->get();

    return view('sepatu.list', compact('sepatus'));
}

public function pemesanan(Request $request)
{
    $sepatu = Sepatu::find($request->sepatu_id);
    $jumlah = $request->jumlah;
    $warna = $request->warna;
    $ukuran = $request->ukuran;
    $totalHarga = $jumlah * $sepatu->harga;
    

    return view('sepatu.pemesanan', compact('sepatu', 'jumlah', 'warna', 'ukuran', 'totalHarga'));
}

public function uploadBukti(Request $request)
{
    // Validasi file yang diunggah
    $request->validate([
        'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Simpan file ke storage
    if ($request->hasFile('bukti_transfer')) {
        $file = $request->file('bukti_transfer');
        $path = $file->store('bukti_transfer', 'public'); // Simpan di storage/app/public/bukti_transfer

        // Lakukan apa pun yang perlu dilakukan dengan path file,
        // Misalnya, menyimpan informasi ke database jika diperlukan.

        return redirect()->back()->with('success', 'Bukti transfer berhasil diunggah!');
    }

    return redirect()->back()->with('error', 'Gagal mengunggah bukti transfer.');
}



}
