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
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select @error('kategori_id') is-invalid

        @enderror" >
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
            @if (old('kategori_id',$pengeluaran->kategori_id) == $kategori->id)
            <option value="{{ $kategori->id}}" selected>{{ $kategori->nama}}</option>
            @else
            <option value="{{ $kategori->id}}">{{ $kategori->nama}}</option>
            @endif

            @endforeach
        </select>
      </div>

    <div class="mb-3">
        <label for="uang" class="form-label">Harga</label>
        <input type="number" class="form-control" id="uang" name="uang" value="{{ old('uang', $pengeluaran->uang) }}" required min="0" step="0.01">
    </div>

    <div class="mb-3">
        <label for="keterangan" class="form-label">Keterangan</label>
        <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $pengeluaran->keterangan) }}" required>
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




    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
</form>

@endsection
