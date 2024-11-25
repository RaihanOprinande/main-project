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

    <div class="form-group">
        <label for="size_id">Select Size:</label>
        <select name="size_id" id="size_id" class="form-control" required>
            <option value="">-- Selece Size --</option>
            @foreach ($sizes as $sizes)
                <option value="{{ $sizes->id }}">{{ $sizes->size }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="brand_id">Select Brand:</label>
        <select name="brand_id" id="brand" class="form-control" required>
            <option value="">-- Select Brand --</option>
            @foreach ($brands as $brand)
                <option value="{{ $brand->id }}">{{ $brand->nama_brand }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="kategori_id">Select Category:</label>
        <select name="kategori_id" id="kategori_id" class="form-control" required>
            <option value="">-- Select Category --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->nama }}</option>
            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="date" class="form-label">Tanggal</label>
        <input type="date" class="form-control @error('date') is-invalid @enderror" name="date" id="date" value="{{ old('date') }}">
        @error('date')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
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
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('date').value = today;
    });
</script>
@endsection
