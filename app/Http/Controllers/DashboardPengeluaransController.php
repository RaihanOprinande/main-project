<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class DashboardPengeluaransController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Cek apakah ada query pencarian
        $search = $request->input('search');

        // Jika ada pencarian, filter berdasarkan nama atau brand atau kategori
        if ($search) {
            $pengeluarans = Pengeluaran::where('size', 'like', "%{$search}%")
                ->orWhere('brand', 'like', "%{$search}%")
                ->orWhere('kategori', 'like', "%{$search}%")
                ->paginate(10); // Pagination 10 item per halaman
        } else {
            // Jika tidak ada pencarian, ambil semua data pengeluaran
            $pengeluarans = Pengeluaran::paginate(10); // Pagination 10 item per halaman
        }

        // Kirim data pengeluaran ke view
        $total = Pengeluaran::sum('harga');
        return view('dashboard.pengeluarans.index', compact('pengeluarans','total'));
    }

    public function create()
    {
        return view('dashboard.pengeluarans.create');
    }

    // Store a newly created Pengeluaran in the database
    public function store(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'size' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'kategori' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
        ]);

        // Create a new Pengeluaran and store it in the database
        Pengeluaran::create([
            'size' => $validatedData['size'],
            'brand' => $validatedData['brand'],
            'kategori' => $validatedData['kategori'],
            'harga' => $validatedData['harga'],
            'quantity' => $validatedData['quantity'],
        ]);

        // Redirect back with a success message
        return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil ditambahkan!');
    }
    public function edit($id)
{
    // Find the Pengeluaran by ID
    $pengeluaran = Pengeluaran::findOrFail($id);

    // Return the edit view with the Pengeluaran data
    return view('dashboard.pengeluarans.edit', compact('pengeluaran'));
}

public function update(Request $request, $id)
{
    // Validate the incoming data
    $validatedData = $request->validate([
        'size' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'kategori' => 'required|string|max:255',
        'harga' => 'required|numeric|min:0',
        'quantity' => 'required|integer|min:1',
    ]);

    // Find the Pengeluaran and update its data
    $pengeluaran = Pengeluaran::findOrFail($id);
    $pengeluaran->update([
        'size' => $validatedData['size'],
        'brand' => $validatedData['brand'],
        'kategori' => $validatedData['kategori'],
        'harga' => $validatedData['harga'],
        'quantity' => $validatedData['quantity'],
    ]);

    // Redirect to the list with a success message
    return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil diperbarui!');
}
public function show($id)
{
    // Find the Pengeluaran by ID
    $pengeluaran = Pengeluaran::findOrFail($id);

    // Return the show view with the Pengeluaran data
    return view('dashboard.pengeluarans.show', compact('pengeluaran'));
}
public function destroy($id)
{
    // Find the Pengeluaran by ID
    $pengeluaran = Pengeluaran::findOrFail($id);

    // Delete the Pengeluaran record
    $pengeluaran->delete();

    // Redirect back with a success message
    return redirect('/dashboard-pengeluarans')->with('pesan', 'Pengeluaran berhasil dihapus!');
}

}
