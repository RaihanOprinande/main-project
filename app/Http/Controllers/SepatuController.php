<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sepatu;

class SepatuController extends Controller
{
    public function index()
    {
        $sepatus = Sepatu::all(); // Ambil semua data sepatu
        return view('sepatu.home', compact('sepatus'));
    }
    public function show($id) {
        $sepatu = Sepatu::find($id);
        return view('sepatu.detail', compact('sepatu'));
    }

}
