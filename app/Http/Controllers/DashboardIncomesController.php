<?php

namespace App\Http\Controllers;

use App\Models\Brands;
use App\Models\Kategori;
use App\Models\Pemasukan;
use App\Models\Size;
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

    public function edit(string $id)
     {

        $incomes = Pemasukan::find($id);
        $kategoris = Kategori::all();
        // $gambars = sepatui::all();
        $mereks = Brands::all();
        // $colors = Color::all();
        $sizes = Size::all();

        return view('dashboard.income.edit', compact('incomes','kategoris','mereks','sizes'));
     }

     public function update(Request $request,string $id){
        $validated = $request->validate([
         'nama' => 'required',
         'harga' => 'required',
         'kategori_id' => 'required',
         'bukti' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
         'merek_id' => 'required',
         'size_id' => 'required',
         'jumlah' => 'required',
         'total' => 'required',
        ]);

        if ($request->file('gambar_sepatu')) {
            $validated['gambar_sepatu'] = $request->file('gambar_sepatu')->store('images','public');
        }

           Pemasukan::where('id', $id)->update($validated);
           return redirect('dashboard-income')->with('pesan','Data berhasil diubah');
     }


     public function destroy(string $id)
     {
        Pemasukan::destroy($id);
        return redirect('dashboard-income')->with('pesan','Data berhasil dihapus');
     }
}
