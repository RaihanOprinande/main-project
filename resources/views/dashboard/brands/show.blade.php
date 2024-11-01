@extends('dashboard.layouts.main')

@section('content')
<h1>Detail Merek</h1>

@if (session('pesan'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Informasi:</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="{{ route('dashboard-brand.index') }}" class="btn btn-secondary mb-3">Kembali ke Daftar Merek</a>

<div class="card">
    <div class="card-body">
        <h2 class="card-title">{{ $brand->nama_merek }}</h2>

        <div class="mb-3">
            <strong>Nama Merek:</strong> {{ $brand->nama_merek }}
        </div>

        <div class="mb-3">
            <strong>Gambar:</strong><br>
            @if ($brand->gambar)
                <img src="{{ asset('images/' . $brand->gambar) }}" alt="{{ $brand->nama_merek }}" style="width: 150px; height: auto;">
            @else
                <span>Tidak ada gambar</span>
            @endif
        </div>

        <a href="{{ route('dashboard-brand.edit', $brand->id) }}" class="btn btn-warning">Edit</a>
        <form action="{{ route('dashboard-brand.destroy', $brand->id) }}" method="post" class="d-inline">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
        </form>
    </div>
</div>
@endsection
