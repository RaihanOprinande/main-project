<?php

namespace App\Http\Controllers;

use App\Models\Sepatu;
use App\Models\Sepatu_size;
use App\Models\Size;
use Illuminate\Http\Request;

class DashboardSepatuSizeController extends Controller
{
    public function index()
    {

            $sepatusizes = Sepatu_size::with('sizes','sepatus')->paginate(10);

            return view('dashboard.stock.index', compact('sepatusizes'));
    }

    public function create()
    {
        $sepatus = Sepatu::all();
        $sizes   = Size::all();
        return view('dashboard.stock.create',compact('sepatus','sizes'));
    }

    public function store(Request $request){
        $request->validate([
            'sepatu_id' => 'required|exists:shoes,id',
            'size_id' => 'required|exists:sizes,id',
            'quantity' => 'required|integer|min:0',
        ]);

        $sepatu = Sepatu::find($request->sepatu_id);
        $sepatu->sizes()->attach($request->size_id, ['quantity' => $request->quantity]);

        return redirect('/dashboard-stock')->with('success', 'Shoe size created successfully.');
    }

    public function edit(string $id)
    {
        $stocks = Sepatu_size::with('sizes','sepatus')->findOrFail($id);
        $sepatus = Sepatu::all();
        $sizes = Size::all();


        return view('dashboard.stock.edit', compact('sepatus', 'sizes','stocks'));
    }

    // Memperbarui sepatu_size
    public function update(Request $request, string $id){
        $validated = $request->validate([
            'quantity' => 'required'
        ]);
        Sepatu_size::where('id',$id)->update($validated);
        return redirect('/dashboard-stock')-> with('pesan', 'Data berhasil diubah');
    }

    public function destroy(string $id)
    {
       Sepatu_size::destroy($id);
       return redirect('/dashboard-stock')->with('pesan','Data berhasil dihapus');
    }
}
