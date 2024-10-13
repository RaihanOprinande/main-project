<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merek;

class MerkController extends Controller
{
    public function index()
    {
        $mereks = Merek::all();
         // Ambil semua data sepatu
        return view('sepatu.home', compact('mereks'));
    }
}
