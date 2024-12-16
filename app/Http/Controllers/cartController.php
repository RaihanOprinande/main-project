<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Customer;
use App\Models\Pengambilan;
use App\Models\Sepatu_size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function index(){
        $carts = Cart::with('sepatus','sizes','brands','customers')->where('customer_id',Auth::guard('customers')->id())->get();
        $pengambilans = Pengambilan::all();

        $totalHarga = $carts->map(function($cart) {
            return $cart->quantity * $cart->sepatus->harga;
        })->sum();

        return view('sepatu.cart',compact('carts','totalHarga','pengambilans'));
    }

    public function store(Request $request){

        $stock = Sepatu_size::where('sepatu_id',$request->sepatu_id)->first();

        if (!$stock || $stock->quantity < 1) {
            return redirect('cart')->with('pesan', 'Stok tidak tersedia.');
        }

        // Validasi input
        Cart::create([
            'customer_id' => Auth::guard('customers')->id(),
            'size_id' => $request-> size_id,
            'sepatu_id' => $request-> sepatu_id,
            'quantity' => $request-> quantity
        ]);

        // $stock->quantity -= $request->quantity ;
        // $stock->save();

        return redirect('cart')->with('pesan', 'Produk berhasil ditambahkan ke keranjang.');
    }

    public function edit(string $id){
        $customers = Customer::find($id);
        return view('sepatu.editcart',compact('customers'));
    }



    public function update(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'name' => 'nullable',
        'nohp' => 'nullable',
        'alamat' => 'required',
    ]);

    // Update data customer
    Customer::where('id',$id)->update($validated);

    // Redirect dengan pesan sukses
    return redirect('cart')->with('pesan', 'Customer berhasil diperbarui!');
}



}
