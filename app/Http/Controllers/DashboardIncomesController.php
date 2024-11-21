<?php

namespace App\Http\Controllers;

use App\Models\Pemasukan;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function cetakPdf()
    {
        // Ambil semua data income beserta relasinya
        $incomes = Pemasukan::with('sepatu', 'color', 'size')->get();

        // Hitung total pemasukan
        $totalPemasukan = $incomes->sum('total');

        // Load view dengan data yang diperlukan
        $pdf = Pdf::loadView('dashboard.income.cetak_pdf', [
            'incomes' => $incomes,
            'totalPemasukan' => $totalPemasukan
        ]);

        // Stream file PDF
        return $pdf->stream('Laporan-Data-Pemasukan.pdf');
    }

}
