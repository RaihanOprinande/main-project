@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-pengeluarans/create" class="btn btn-primary mb-2">Tambah Pengeluaran</a>

<div class="row mb-3 mt-4">
    <div class="col-md-4">
        <form class="d-flex" role="search" action="{{ url('/dashboard-pengeluarans') }}" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Cari sepatu, brand, atau kategori" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
        </form>
    </div>
</div>

<table class="table table-bordered">
    <thead class="table-primary">
        <tr>
            <th>No</th>
            <th>Sepatu</th>
            <th>Size</th>
            <th>Brand</th>
            <th>Kategori</th>
            <th>Harga</th>
            <th>Quantity</th>
            <th>Total Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pengeluarans as $pengeluaran)
        <tr>
            <td>{{ $pengeluarans->firstItem() + $loop->index }}</td>
            <td>{{ $pengeluaran->sepatu }}</td>
            <td>{{ $pengeluaran->size }}</td>
            <td>{{ $pengeluaran->brand }}</td>
            <td>{{ $pengeluaran->kategori }}</td>
            <td>Rp {{ number_format($pengeluaran->harga, 0, ',', '.') }}</td>
            <td>{{ $pengeluaran->quantity }}</td>
            <td>Rp {{ number_format($pengeluaran->harga * $pengeluaran->quantity, 0, ',', '.') }}</td>
            <td class="text-nowrap">
                <a href="/dashboard-pengeluarans/{{ $pengeluaran->id }}" class="btn btn-success btn-sm" title="Lihat detail">Detail</a>
                <a href="/dashboard-pengeluarans/{{ $pengeluaran->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
                <form action="/dashboard-pengeluarans/{{ $pengeluaran->id }}" method="post" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    <tfoot>
        <tr>
            <td colspan="7" class="text-end"><strong>Total Pengeluaran</strong></td>
            <td colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</td>
        </tr>
    </tfoot>
</table>

<div class="mt-3">
    {{ $pengeluarans->links() }}
</div>

@endsection
