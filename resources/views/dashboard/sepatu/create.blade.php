@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Data Sepatu</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-sepatu" method="post">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="0">
        @error('nama')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror

      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga') }}">
        @error('harga')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror

      </div>





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
        <label class="form-label">Merek</label>
        <select name="merek_id" class="form-select">
            <option value="">Pilih Merek</option>
            @foreach ($mereks as $merek)
            <option value="{{ $merek->id}}">{{ $merek->nama_merek}}</option>
            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Gambar</label>
        <select name="gambar_id" class="form-select">
            <option value="">Pilih Gambar</option>
            @foreach ($gambars as $gambar)
            <option value="{{ $gambar->id}}">{{ $gambar->gambar_sepatu}}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Warna</label>
        <select name="color_id" class="form-select">
            <option value="">Pilih Warna</option>
            @foreach ($colors as $color)
            <option value="{{ $color->id}}">{{ $color->color}}</option>
            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Size</label>
        <select name="size_id" class="form-select">
            <option value="">Pilih Ukuran</option>
            @foreach ($sizes as $size)
            <option value="{{ $size->id}}">{{ $size->size}}</option>
            @endforeach
        </select>
      </div>




      <div class="mb-3">

        <input type="submit" class="btn btn-primary" name="submit">
      </div>
</form>
</div>
</div>
@endsection
