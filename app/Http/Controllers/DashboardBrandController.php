<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;

class DashboardBrandController extends Controller
{
    public function index()
    {
        $brands=Merek::latest();

        return view('dashboard.brands.index',['brands'=>$brands->paginate(10)]);
    }
    public function create(){
        $brands=Merek::latest();

        return view('dashboard.brands.create',compact('brands'));
     }

     public function store(Request $request){
        $validated = $request->validate([

         'nama_merek' => 'required',
         'gambar' => 'required',
        ]);

        //dd($validated);

        Merek::create($validated);
        return redirect('dashboard-brand')->with('pesan','Data berhasil disimpan');
     }

     public function edit(string $id)
     {
        $brands = Merek::all();
        return view('dashboard.brands.edit', compact('brands'));
     }

     public function update(Request $request,string $id){
        $validated = $request->validate([
         'nama_merek' => 'required',
         'gambar' => 'required',
        ]);

           Merek::where('id', $id)->update($validated);
           return redirect('dashboard-brand')->with('pesan','Data berhasil diubah');
     }


     public function destroy(string $id)
     {
        Merek::destroy($id);
        return redirect('dashboard-sepatu')->with('pesan','Data berhasil dihapus');
     }

     public function show(string $id)
     {
        $brands = Merek::findOrFail($id);
        return view('dashboard.brands.show',compact('brands'));
     }
}
