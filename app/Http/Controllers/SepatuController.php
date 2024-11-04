<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sepatu;
use App\Models\Merek;
use App\Models\Size;
use App\Models\Pemesanan;

class SepatuController extends Controller
{
    public function index()
    {
        $mereks = Brands::all();
        $sepatus = Sepatu::all();
        $sizes = Size::all();

    return view('home', compact('mereks', 'sepatus', 'sizes'));
    }
    public function show($id) {
        $sepatu = Sepatu::with('sizes','gambars')->find($id);
        // $sizes = Size::all();
        // $stocks = Sepatu::with(['gambars', 'kategori', 'color', 'merek'])->get();
        // $sepatus = Sepatu::with(['size'])->find('$id');
        return view('sepatu.detail', compact('sepatu'));
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
    $gambar = $request->gambar;
    $jumlah = $request->jumlah;
    $warna = $request->warna;
    $ukuran = $request->ukuran;
    $totalHarga = $jumlah * $sepatu->harga;


    return view('sepatu.pemesanan', compact('sepatu', 'jumlah', 'warna', 'ukuran', 'totalHarga','gambar'));
}

public function prosesBayar(Request $request)
{
    $request->validate([
        'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'id' => 'required|exists:shoes,id', // Memastikan sepatu ID ada
        'jumlah' => 'required|integer',
    ]);

    // Mengambil data sepatu beserta warna dan ukuran
    $sepatu = Sepatu::with(['colors', 'sizes'])->find($request->id);
    $totalHarga = $sepatu->harga * $request->jumlah; // Menghitung total harga

    // Menyimpan bukti bukti pembayaran
    $path = $request->file('bukti')->store('bukti', 'public');

    // Menyimpan data pemesanan ke dalam tabel `pemesanans`
    Pemesanan::create([
        'sepatu_id' => $sepatu->id,
        'harga' => $sepatu->harga,
        'jumlah' => $request->jumlah,
        'color_id' => $sepatu->color_id,
        'size_id' => $sepatu->size_id,
        'total' => $totalHarga,
        'bukti' => $path,
    ]);

    return redirect()->route('sepatu.home')->with('success', 'Pemesanan berhasil disimpan');
}



}
