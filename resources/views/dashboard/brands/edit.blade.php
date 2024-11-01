@extends('dashboard.layouts.main')

@section('content')
<h1>Edit Merek</h1>

@if (session('pesan'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Sukses!</strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="{{ route('dashboard-brand.index') }}" class="btn btn-secondary mb-3">Kembali</a>

<form action="{{ route('dashboard-brand.update', $brand->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="nama_merek" class="form-label">Nama Merek</label>
        <input type="text" name="nama_merek" id="nama_merek" class="form-control" value="{{ old('nama_merek', $brand->nama_merek) }}" required>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        @if ($brand->gambar)
        <div class="mb-2">
            <img src="{{ asset('images/' . $brand->gambar) }}" alt="{{ $brand->nama_merek }}" style="width: 100px; height: auto;">
        </div>
        @endif
        <input type="file" name="gambar" id="gambar" class="form-control">
        <small class="form-text text-muted">Kosongkan jika tidak ingin mengubah gambar.</small>
    </div>

    <button type="submit" class="btn btn-primary">Update Merek</button>
</form>
@endsection
