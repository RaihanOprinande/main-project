@extends('layouts.main')

@section('content')

{{-- untuk menampilkan pesan --}}
@if (session('pesan'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   {{session('pesan')}}
</div>
@endif

{{-- untuk menampilkan jika keranjang kosong --}}
@if ($carts->count() == 0)
    <div class="cart-kosong text-center mt-5">
        <h1>Cart anda masih kosong silahkan belanja<h1>
    </div>
@else
    <h1>Cart</h1>
    <table class="table table-bordered mb-5">
    <tr>
        <th>Gambar</th>
        <th>Produk</th>
        <th>Kategori</th>
        <th>Merek</th>
        <th>Size</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Sub harga</th>
        <th></th>
    </tr>
    @foreach ($carts as $cart)
    <tr>
        <td><img src="{{ asset('storage/' . $cart->sepatus->gambar_sepatu) }}" width="150px" height="auto" alt=""></td>
        <td>{{ $cart->sepatus->nama }}</td>
        <td>{{ $cart->sepatus->kategori->nama }}</td>
        <td>{{ $cart->sepatus->brands->nama_brand }}</td>
        <td>{{ $cart->sizes->size }}</td>
        <td>RP. {{ number_format($cart->sepatus->harga, 0, ',', '.') }}</td>
        <td>{{ $cart->quantity }}</td>
        <td> RP. {{ number_format($cart->quantity*$cart->sepatus->harga, 0, ',', '.') }}</td>
        <td class="text-nowrap">
            <button class="btn btn-danger btn-sm">Cancel</button>
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="7" class="text-end ms-5"><strong>Total</strong></td>
        <td colspan="2"><strong>Rp. {{ number_format($totalHarga, 0, ',','.') }}</strong></td>
    </tr>
    </table>

    {{-- Menampilkan informasi customer hanya sekali --}}
    @php
        $customer = $carts->first()->customers; // Mendapatkan customer dari cart pertama
    @endphp

    <div class="mb-3">
        <table class="table table-bordered">
            <tr>
                <th>Nama</th>
                <th>No.HP</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
            <tr>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->nohp }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>
                    <a href="/cart/update-customer/{{ $customer->id }}/edit" class="btn btn-warning btn-sm" title="Edit">
                        <i class="bi bi-pencil-square"></i> Edit
                    </a>
                </td>
            </tr>
        </table>
    </div>

    {{-- Pengambilan Barang --}}
    <div class="form-group">
        <label for="sepatu">Pilih Pengambilan barang</label>
        <select name="pengambilan" id="pengambilan" class="form-control" required>
            <option value="">-- Pilih metode pengambilan --</option>
            @foreach ($pengambilans as $pengambilan)
                <option value="{{ $pengambilan->id }}">{{ $pengambilan->metode }}</option>
            @endforeach
        </select>
    </div>

    {{-- Button Kembali dan Check Out --}}
    <div class="button-konfirmasi mt-4">
        <a href="/list" class="btn btn-dark">Kembali belanja</a>
        <a href="/list" class="btn btn-success">Check out</a>
    </div>
@endif

@endsection
