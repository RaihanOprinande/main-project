<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function register(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email|max:255',
            'nohp' => 'required|string|max:15',
            'alamat' => 'required|string|max:500',
            'password' => 'required|string|min:4|confirmed', // Tambahkan konfirmasi password jika perlu
        ]);

        $validated['password'] = Hash::make($validated['password']);

        Customer::create($validated);
        return redirect()->route('loginpelanggan')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }


}
