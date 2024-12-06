<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginPelangganController extends Controller
{
    public function login()
    {
        return view('loginpelanggan');
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customer')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }


        return back()->withErrors([
            'loginpelanggan' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    public function logout(Request $request): RedirectResponse
{
    Auth::guard('customer')->logout(); // Logout dari guard customer
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/loginpelanggan');
}

}
