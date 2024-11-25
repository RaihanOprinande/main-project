@extends('dashboard.layouts.main')

@section('content')

<h1>Detail Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-pengeluarans" class="btn btn-secondary mb-2">Kembali ke Daftar</a>

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Sepatu: {{ $pengeluaran->sepatu }}</h5>
        <p class="card-text"><strong>Size:</strong> {{ $pengeluaran->size }}</p>
        <p class="card-text"><strong>Brand:</strong> {{ $pengeluaran->brand }}</p>
        <p class="card-text"><strong>Kategori:</strong> {{ $pengeluaran->kategori }}</p>
        <p class="card-text"><strong>Harga:</strong> Rp {{ number_format($pengeluaran->harga, 0, ',', '.') }}</p>
        <p class="card-text"><strong>Quantity:</strong> {{ $pengeluaran->quantity }}</p>
        <p class="card-text"><strong>Total Harga:</strong> Rp {{ number_format($pengeluaran->harga * $pengeluaran->quantity, 0, ',', '.') }}</p>
    </div>
</div>

<div class="mt-3">
    <a href="/dashboard-pengeluarans/{{ $pengeluaran->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
    <form action="/dashboard-pengeluarans/{{ $pengeluaran->id }}" method="post" class="d-inline">
        @method('DELETE')
        @csrf
        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
    </form>
</div>

@endsection
