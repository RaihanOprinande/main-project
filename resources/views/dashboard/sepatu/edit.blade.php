@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Input Data Sepatu</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-sepatu/{{$sepatus->id}}" method="post">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Sepatu</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama',$sepatus->nama) }}">
        @error('nama')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga',$sepatus->harga) }}">
        @error('harga')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror

      </div>





      <div class="mb-3">
        <label class="form-label">Kategori</label>
        <select name="kategori_id" class="form-select @error('kategori_id') is-invalid

        @enderror" >
            <option value="">Pilih Kategori</option>
            @foreach ($kategoris as $kategori)
            @if (old('kategori_id',$sepatus->kategori_id) == $kategori->id)
            <option value="{{ $kategori->id}}" selected>{{ $kategori->nama}}</option>
            @else
            <option value="{{ $kategori->id}}">{{ $kategori->nama}}</option>
            @endif

            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Merek</label>
        <select name="merek_id" class="form-select @error('merek_id') is-invalid

        @enderror" >
            <option value="">Pilih Prodi</option>
            @foreach ($mereks as $merek)
            @if (old('merek_id',$sepatus->merek_id) == $merek->id)
            <option value="{{ $merek->id}}" selected>{{ $merek->nama_merek}}</option>
            @else
            <option value="{{ $merek->id}}">{{ $merek->nama_merek}}</option>
            @endif

            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label class="form-label">Gambar</label>
        <select name="gambar_id" class="form-select @error('gambar_id') is-invalid

        @enderror" >
            <option value="">Pilih Gambar</option>
            @foreach ($gambars as $gambar)
            @if (old('gambar_id',$sepatus->gambar_id) == $gambar->id)
            <option value="{{ $gambar->id}}" selected>{{ $gambar->gambar}}</option>
            @else
            <option value="{{ $gambar->id}}">{{ $gambar->gambar}}</option>
            @endif

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
