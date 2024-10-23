<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;
use App\Models\Merek;

class SepatuController extends Controller
{
    public function index()
    {
        $mereks = Merek::all(); // Mengambil semua data merek
    $sepatus = Sepatu::all(); // Mengambil semua data sepatu

    return view('home', compact('mereks', 'sepatus'));
    }
    public function show($id) {
        $sepatu = Sepatu::find($id);
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
    $sepatus = Sepatu::where('kategori', $kategori)->get();

    return view('sepatu.list', compact('sepatus'));
}


}
