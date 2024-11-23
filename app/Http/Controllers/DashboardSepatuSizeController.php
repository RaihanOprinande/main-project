<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Models\Sepatu_size;
use Illuminate\Http\Request;

class DashboardSepatuSizeController extends Controller
{
    public function index($id)
    {
        //  $stocks=Sepatu_size::latest()->paginate(10);
        //  return view('dashboard.stock.index',['stocks'=>$stocks])

            $sepatus = Sepatu::find($id);
            $sizes = $sepatus->sizes()->get();
            return view('dashboard.stock.index', ['sizes' => $sizes]);
    }
}
