@extends('dashboard.layouts.main')
@section('content')

<h1>Tambah Pengeluaran</h1>

@if ($errors->any())
  <div class="alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<form action="/dashboard-pengeluarans" method="POST">
    @csrf
    <div class="mb-3">
        <label for="sepatu" class="form-label">Sepatu</label>
        <input type="text" name="sepatu" class="form-control" id="sepatu" value="{{ old('sepatu') }}" required>
    </div>

    <div class="mb-3">
        <label for="size" class="form-label">Size</label>
        <input type="number" name="size" class="form-control" id="size" value="{{ old('size') }}" required>
    </div>

    <div class="mb-3">
        <label for="brand" class="form-label">Brand</label>
        <input type="text" name="brand" class="form-control" id="brand" value="{{ old('brand') }}" required>
    </div>

    <div class="mb-3">
        <label for="kategori" class="form-label">Kategori</label>
        <select name="kategori" id="kategori" class="form-select" required>
            <option value="" disabled selected>Pilih Kategori</option>
            <option value="Casual" {{ old('kategori') == 'Casual' ? 'selected' : '' }}>Casual</option>
            <option value="Sport" {{ old('kategori') == 'Sport' ? 'selected' : '' }}>Sport</option>
            <option value="Formal" {{ old('kategori') == 'Formal' ? 'selected' : '' }}>Formal</option>
        </select>
    </div>

    <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" id="harga" value="{{ old('harga') }}" required>
    </div>

    <div class="mb-3">
        <label for="quantity" class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control" id="quantity" value="{{ old('quantity') }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="/dashboard-pengeluarans" class="btn btn-secondary">Batal</a>
</form>

@endsection
