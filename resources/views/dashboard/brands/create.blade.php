@extends('dashboard.layouts.main')
@section('content')
<h1>Tambah Merek Baru</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('dashboard-brand.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="nama_brand" class="form-label">Nama Brand</label>
        <input type="text" class="form-control @error('nama_brand') is-invalid @enderror" id="nama_brand" name="nama_brand" value="{{ old('nama_brand') }}" required>
        @error('nama_brand')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" accept="image/*" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" required>
        @error('gambar')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="{{ route('dashboard-brand.index') }}" class="btn btn-secondary">Batal</a>
</form>
@endsection
