<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use App\Models\Pemesanan;
use Illuminate\Http\Request;


class DashboardOrderController extends Controller
{
    public function index()
    {
        $orders=Pemesanan::latest();
         // $sepatus=Sepatu::latest()->paginate(10);
         return view('dashboard.order.order',['orders'=>$orders->paginate(10)]);
    }

    public function destroy(string $id)
     {
        Pemesanan::destroy($id);
        return redirect('dashboard-order')->with('pesan','Data berhasil dihapus');
     }

     




}
