<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Sepatu;
use App\Models\Merek;
use App\Models\Pemasukan;
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
        $sepatu = Sepatu::with('sizes')->find($id);
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
    $ukuran = $request->size;
    $totalHarga = $jumlah * $sepatu->harga;


    return view('sepatu.pemesanan', compact('sepatu', 'jumlah','ukuran', 'totalHarga','gambar'));
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
        'nama' => $sepatu->nama,
        'harga' => $sepatu->harga,
        'jumlah' => $request->jumlah,
        'kategori_id' => $sepatu->kategori_id,
        'merek_id' => $sepatu->brands_id,
        'size_id' => $request->ukuran,
        'total' => $totalHarga,
        'bukti' => $path,
        'status' => 'pending',
    ]);

    return redirect()->route('sepatu.home')->with('success', 'Pemesanan berhasil disimpan');
}

public function confirmOrder($id)
{
    // Temukan pesanan berdasarkan ID
    $order = Pemesanan::findOrFail($id);

    // Update status pesanan menjadi "diproses"
    $order->status = 'processed';
    $order->save();

    // Simpan data ke tabel pemasukan
    Pemasukan::create([
        'nama' => $order->nama,
        'harga' => $order->harga,
        'kategori_id' => $order->kategori_id,
        'bukti' => $order->bukti,
        'merek_id' => $order->merek_id,
        'size_id' => $order->size_id,
        'jumlah' => $order->jumlah,
        'total' => $order->total,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui dan data telah disimpan ke tabel pemasukan.');
}



}
