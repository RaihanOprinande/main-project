<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Merek;
use App\Models\Sepatu;
use App\Models\ShoeImages;
use Illuminate\Http\Request;

class DashboardSepatuController extends Controller

{
    public function index()
    {
        $sepatus=Sepatu::latest();


         // $sepatus=Sepatu::latest()->paginate(10);
         return view('dashboard.sepatu.index',['sepatus'=>$sepatus->paginate(10)]);

    }
    public function create(){
        $kategoris = Kategori::all();
        $gambars = ShoeImages::all();
        $mereks = Merek::all();

        return view('dashboard.sepatu.create',compact('kategoris','gambars','mereks'));
     }

     public function store(Request $request){
        $validated = $request->validate([

         'nama' => 'required',
         'harga' => 'required',
         'kategori_id' => 'required',
         'gambar_id' => 'required',
         'merek_id' => 'required',

        ]);

        //dd($validated);

        Sepatu::create($validated);
        return redirect('dashboard-sepatu')->with('pesan','Data berhasil disimpan');
     }

     public function edit(string $id)
     {
        $kategoris = Kategori::all();
        $gambars = ShoeImages::all();
        $mereks = Merek::all();
        $sepatus = Sepatu::find($id);
        return view('dashboard.sepatu.edit', compact('kategoris','gambars','mereks','sepatus'));
     }

     public function update(Request $request,string $id){
        $validated = $request->validate([
         'nama' => 'required',
         'harga' => 'required',
         'kategori_id' => 'required',
         'gambar_id' => 'required',
         'merek_id' => 'required',



           ]);

           Sepatu::where('id', $id)->update($validated);
           return redirect('dashboard-sepatu')->with('pesan','Data berhasil diubah');
     }


     public function destroy(string $id)
     {
        Sepatu::destroy($id);
        return redirect('dashboard-sepatu')->with('pesan','Data berhasil dihapus');
     }

     public function show(string $id)
     {
        $sepatus = Sepatu::findOrFail($id);
        return view('dashboard.sepatu.show',compact('sepatus'));
     }




}
