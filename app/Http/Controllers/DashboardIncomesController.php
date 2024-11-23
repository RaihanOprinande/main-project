<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Illuminate\Http\Request;

class DashboardIncomesController extends Controller
{
    public function index()
    {
        $incomes=Pemasukan::latest();
         // $sepatus=Sepatu::latest()->paginate(10);
         $totalPemasukan = Pemasukan::sum('total');
         return view('dashboard.income.income',['incomes'=>$incomes->paginate(10),'totalPemasukan'=>$totalPemasukan]);
    }
}
