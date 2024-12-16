<?php

namespace App\Http\Controllers;

use App\Models\Pengambilan;
use Illuminate\Http\Request;

class DashboardPengambilanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengambilans = Pengambilan::paginate(10);
        return view('dashboard.pengambilan.index',compact('pengambilans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.pengambilan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'metode' => 'required',
            'ongkir' => 'required',
        ]);

        // Simpan data ke database
        Pengambilan::create($request->all());

        return redirect('/dshbrd-pengambilan')->with('pesan', 'Pengeluaran berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
//
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pengambilans = Pengambilan::find($id);
        return view('dashboard.pengambilan.edit',compact('pengambilans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'metode' => 'required',
            'ongkir' => 'required',
        ]);
        Pengambilan::where('id',$id)->update($validated);
        return redirect('/dshbrd-pengambilan')-> with('pesan', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Pengambilan::destroy($id);
        return redirect('/dshbrd-pengambilan')->with('pesan','Data berhasil dihapus');
    }
}
