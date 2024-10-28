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

public function order()
{
    class ProductController extends Controller
{
//     public function order(Request $request, $id)
//     {
//         // Temukan produk berdasarkan ID
//         $product = Product::find($id);

//         // Pastikan produk ditemukan dan memiliki cukup stock
//         if ($product && $product->stock > 0) {
//             // Kurangi size dan stock
//             $product->size -= 1;
//             $product->stock -= 1;

//             // Simpan perubahan
//             $product->save();

//             return response()->json([
//                 'message' => 'Order berhasil!',
//                 'product' => $product
//             ]);
//         }

//         return response()->json(['message' => 'Produk tidak ditemukan atau stok habis.'], 404);
//     }
}
}

}
