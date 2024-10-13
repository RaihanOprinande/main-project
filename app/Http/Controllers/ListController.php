<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;

class ListController extends Controller
{
    // SepatuController.php
public function index(Request $request)
{
    // Jika ada query search, filter berdasarkan nama atau kategori
    $search = $request->input('search');

    $sepatus = Sepatu::when($search, function ($query, $search) {
        return $query->where('nama', 'like', "%{$search}%")
                     ->orWhere('kategori', 'like', "%{$search}%");
    })->get();

    return view('sepatu.list', compact('sepatus'));
}

}
