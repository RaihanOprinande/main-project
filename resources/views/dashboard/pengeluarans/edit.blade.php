@extends('dashboard.layouts.main')

@section('content')

<h1>Edit Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-pengeluarans" class="btn btn-secondary mb-2">Kembali ke Daftar</a>

<form action="{{ route('dashboard-pengeluarans.update', $pengeluaran->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="sepatu" class="form-label">Sepatu</label>
        <input type="text" class="form-control" id="sepatu" name="sepatu" value="{{ old('sepatu', $pengeluaran->sepatu) }}" required>
    </div>

    <div class="mb-3">
        <label for="size" class="form-label">Size</label>
        <input type="number" class="form-control" id="size" name="size" value="{{ old('size', $pengeluaran->size) }}" required min="30" max="50">
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" class="form-control" id="brand" name="brand" value="{{ old('brand', $pengeluaran->brand) }}" required>
    </div>

    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select class="form-select" id="kategori" name="kategori" required>
            <option value="Casual" {{ $pengeluaran->kategori == 'Casual' ? 'selected' : '' }}>Casual</option>
            <option value="Sport" {{ $pengeluaran->kategori == 'Sport' ? 'selected' : '' }}>Sport</option>
            <option value="Formal" {{ $pengeluaran->kategori == 'Formal' ? 'selected' : '' }}>Formal</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $pengeluaran->harga) }}" required min="0" step="0.01">
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $pengeluaran->quantity) }}" required min="1">
    </div>

    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

@endsection
