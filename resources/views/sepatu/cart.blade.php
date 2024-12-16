@extends('layouts.main')
@section('content')

{{-- untuk menampilkan pesan --}}
@if (session('pesan'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
   {{session('pesan')}}
  {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
</div>
@endif

{{-- untuk menampilkan jika keranjang kosong --}}
@if ($carts->count() == 0)
    <div class="cart-kosong text-center mt-5">
        <h1>Cart anda masih kosong silahkan belanja<h1>
    </div>
{{-- menmapilkan jika kerangjang ada --}}
@else
    <h1>Cart</h1>
    <table class="table table-bordered mb-5">
    <tr>
        {{-- <th>No</th> --}}
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
        {{-- <td>{{ $carts->firstItem() + $loop->index }}</td> --}}
        <td><img src="{{ asset('storage/' . $cart->sepatus->gambar_sepatu) }}" width="150px" height="auto" alt=""></td>
        <td>{{ $cart->sepatus->nama }}</td>
        <td>{{ $cart->sepatus->kategori->nama }}</td>
        <td>{{ $cart->sepatus->brands->nama_brand }}</td>
        <td>{{ $cart->sizes->size }}</td>
        <td>RP. {{ number_format($cart->sepatus->harga, 0, ',', '.') }}</td>
        <td>{{ $cart->quantity }}</td>
        <td> RP. {{ number_format($cart->quantity*$cart->sepatus->harga, 0, ',', '.') }}</td>

        <td class="text-nowrap">
            {{-- <form action="" method="post" class="d-inline">
                @method('DELETE')
                @csrf --}}
                <button class="btn btn-danger btn-sm" >Cancel</button>
            {{-- </form> --}}
        </td>
    </tr>



    @endforeach
    <tr>
        {{-- <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td> --}}
        <td colspan="7" class="text-end ms-5"><strong>Total</strong></td>
        <td colspan="2"><strong>Rp. {{ number_format($totalHarga, 0, ',','.') }}</strong></td>
        {{-- <td></td> --}}

    </tr>

</table>


<div class="mb-3">
    <table class="table table-bordered">
        @foreach ($carts as $cart)

        <tr>
            <th>Nama</th>
            <th>No.HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>{{ $cart->customers->name }}</td>
            <td>{{ $cart->customers->nohp }}</td>
            <td>{{ $cart->customers->alamat }}</td>
            <td><a href="" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>

            </td>
        </tr>
        @endforeach
    </table>
</div>

<div class="form-group">
    <label for="sepatu">Pilih Pengambilan barang</label>
    <select name="pengambilan" id="pengambilan" class="form-control" required>
        <option value="">-- Pilih metode pengambilan --</option>
        @foreach ($pengambilans as $pengambilan)
            <option value="{{ $pengambilan->id }}">{{ $pengambilan->metode }}</option>
        @endforeach
    </select>
</div>



{{-- ini kodingan untuk 2 button di bawah --}}
<div class="button-konfirmasi mt-4">
    <a href="/list" class="btn btn-dark">Kembali belanja</a>
    <a href="/list" class="btn btn-success">Check out</a>
</div>

{{-- {{ $carts->links() }} --}}
@endif


@endsection



