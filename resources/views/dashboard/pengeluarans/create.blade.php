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
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select">
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
            <option value="{{ $kategori->id}}">{{ $kategori->nama}}</option>
            @endforeach
        </select>
      </div>

    <div class="mb-3">
        <label for="uang" class="form-label">Harga</label>
        <input type="number" name="uang" class="form-control" id="uang" value="{{ old('uang') }}" required>
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ old('keterangan') }}" required>
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
