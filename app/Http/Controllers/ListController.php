<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;
use App\Models\Merek;

class ListController extends Controller
{
    // SepatuController.php
    public function search(Request $request)
    {
        // Ambil input dari form search
        $search = $request->input('search');

        // Cek apakah input search kosong
        if (empty($search)) {
            // Jika kosong, tampilkan pesan atau alihkan kembali tanpa melakukan pencarian
            return redirect()->back()->with('error', 'Silakan isi kata kunci pencarian.');
        }

        // Lakukan pencarian jika search terisi
        $sepatus = Sepatu::where('nama', 'like', "%{$search}%")
                         ->orWhere('kategori', 'like', "%{$search}%")
                         ->get();

        // Tampilkan halaman dengan pesan jika data tidak ditemukan
        if ($sepatus->isEmpty()) {
            return view('sepatu.list', [
                'sepatus' => $sepatus,
                'message' => 'Data tidak ditemukan untuk kata kunci: ' . $search
            ]);
        }

        return view('sepatu.list', compact('sepatus'));
    }


public function sepatuByMerek($id)
{
    $mereks = Merek::all(); // Jika ingin tetap menampilkan merek di halaman
    $sepatus = Sepatu::where('merek_id', $id)->get(); // Mengambil sepatu berdasarkan merek

    return view('sepatu.list', compact('mereks', 'sepatus'));
}
public function index()
{
    $mereks = Merek::all(); // Mengambil semua data merek
    $sepatus = Sepatu::all(); // Mengambil semua data sepatu

return view('sepatu.list', compact('mereks', 'sepatus'));
}


}
