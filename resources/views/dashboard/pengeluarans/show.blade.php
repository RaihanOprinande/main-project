@extends('dashboard.layouts.main')

@section('content')

<h1>Detail Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="card">
    <div class="card-header">
        <h5 class="card-title">Detail Pengeluaran</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Size:</strong> {{ $pengeluaran->size }}
        </div>
        <div class="mb-3">
            <strong>Brand:</strong> {{ $pengeluaran->brand }}
        </div>
        <div class="mb-3">
            <strong>Kategori:</strong> {{ $pengeluaran->kategori }}
        </div>
        <div class="mb-3">
            <strong>Harga:</strong> Rp {{ number_format($pengeluaran->harga, 2, ',', '.') }}
        </div>
        <div class="mb-3">
            <strong>Quantity:</strong> {{ $pengeluaran->quantity }}
        </div>
        <div class="mb-3">
            <strong>Total:</strong> Rp {{ number_format($pengeluaran->harga * $pengeluaran->quantity, 2, ',', '.') }}
        </div>
    </div>
    <div class="card-footer">
        <a href="/dashboard-pengeluarans" class="btn btn-secondary">Kembali ke Daftar</a>
    </div>
</div>

@endsection
