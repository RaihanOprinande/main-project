<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $stocks = Sepatu::with(['gambar', 'kategori', 'color', 'merek'])->get();
        // $sepatus = Sepatu::with(['size'])->find('$id');
        return view('sepatu.detail', compact('sepatu','stocks','sizes'));
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


}
