<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function show()
    {
        // Logika untuk menampilkan halaman pembayaran, jika perlu
        return view('bayar'); // Ganti 'bayar' dengan nama view yang sesuai
    }

    public function prosesBayar(Request $request)
    {
        // Validasi data yang diterima
        $request->validate([
            'bukti_transfer' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan bukti transfer ke server atau ke sistem Anda
        $bukti_transfer = $request->file('bukti_transfer');
        $path = $bukti_transfer->store('uploads', 'public');

        // Logika untuk menyimpan data pembayaran ke database
        // Misalnya, Anda bisa menyimpan ke tabel `pembayaran`
        // Pembayaran::create([...]);

        // Redirect atau kembalikan respons
        return redirect()->route('sepatu.detail', ['id' => $request->id])->with('success', 'Pembayaran berhasil diproses!');
    }
}
