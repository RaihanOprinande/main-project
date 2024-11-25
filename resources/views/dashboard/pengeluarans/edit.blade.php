@extends('dashboard.layouts.main')

@section('content')

<h1>Edit Pengeluaran</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Berhasil</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-pengeluarans" class="btn btn-secondary mb-2">Kembali ke Daftar</a>

<form action="/dashboard-pengeluarans/{{ $pengeluaran->id }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="sepatu" class="form-label">Sepatu</label>
        <input type="text" class="form-control" id="sepatu" name="sepatu" value="{{ old('sepatu', $pengeluaran->sepatu) }}" required>
    </div>

    <div class="form-group">
        <label for="size_id">Select Size:</label>
        <select name="size_id" id="sepatu" class="form-control" required>
            <option value="">-- Pilih Size --</option>
            @foreach ($sizes as $size)
            @if (old('size_id',$pengeluaran->size_id) == $size->id)
                <option value="{{ $size->id }}" selected>{{ $size->size }}</option>
            @else
                <option value="{{ $size->id }}">{{ $size->size }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="brand_id">Select Brand:</label>
        <select name="brand_id" id="brand_id" class="form-control" required>
            <option value="">-- Pilih brand --</option>
            @foreach ($brands as $brand)
            @if (old('brand_id',$pengeluaran->brand_id) == $brand->id)
                <option value="{{ $brand->id }}" selected>{{ $brand->nama_brand }}</option>
            @else
                <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="kategori_id">Select kategori:</label>
        <select name="kategori_id" id="kategori_id" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            @foreach ($categories as $category)
            @if (old('kategori_id',$pengeluaran->kategori_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->nama }}</option>
            @else
                <option value="{{ $category->id }}">{{ $category->nama }}</option>
            @endif
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Date</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date',$pengeluaran->date) }}">
        @error('date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
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
