<?php

namespace App\Http\Controllers;

use App\Models\History;
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

public function prosesBayar(Request $request)
{
    $request->validate([
        'bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'id' => 'required|exists:shoes,id', // Memastikan sepatu ID ada
        'jumlah' => 'required|integer',
    ]);

    // Mengambil data sepatu beserta warna dan ukuran
    $sepatu = Sepatu::with(['color', 'size'])->find($request->id);
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



    return redirect()->route('riwayat.pemesanan')->with('success', 'Pemesanan berhasil disimpan');
}
public function riwayatPemesanan()
{
    $histories = History::with(['sepatu', 'color', 'size','order'])->paginate(10); // Menggunakan pagination
    return view('sepatu.riwayat-pemesanan', compact('histories'));
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
        'sepatu_id' => $order->sepatu_id,
        'harga' => $order->harga,
        'color_id' => $order->color_id,
        'size_id' => $order->size_id,
        'jumlah' => $order->jumlah,
        'total' => $order->total,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui dan data telah disimpan ke tabel pemasukan.');
}

public function history($id)
{
    // Temukan pesanan berdasarkan ID
    $order = Pemesanan::findOrFail($id);



    // Simpan data ke tabel pemasukan
    History::create([
        'sepatu_id' => $order->sepatu_id,
        'harga' => $order->harga,
        'color_id' => $order->color_id,
        'size_id' => $order->size_id,
        'jumlah' => $order->jumlah,
        'total' => $order->total,
        'status' => $order->status,
    ]);

    // Redirect dengan pesan sukses
    return redirect()->route('riwayat.pemesanan')->with('success', 'Pemesanan berhasil disimpan');
}





}
