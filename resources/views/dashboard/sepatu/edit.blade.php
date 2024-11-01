@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Data Sepatu</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-sepatu/{{$sepatus->id}}" method="post">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="kode_sepatu" class="form-label">Kode Sepatu</label>
        <input type="text" class="form-control @error('kode_sepatu') is-invalid @enderror" name="kode_sepatu" id="kode_sepatu" value="{{ old('kode_sepatu',$sepatus->kode_sepatu) }}">
        @error('kode_sepatu')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>
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
            <option value="{{ $gambar->id}}" selected>{{ $gambar->gambar_sepatu}}</option>
            @else
            <option value="{{ $gambar->id}}">{{ $gambar->gambar_sepatu}}</option>
            @endif

            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Warna</label>
        <select name="color_id" class="form-select @error('size_id') is-invalid

        @enderror" >
            <option value="">Pilih Warna</option>
            @foreach ($colors as $color)
            @if (old('color_id',$sepatus->color_id) == $color->id)
            <option value="{{ $color->id}}" selected>{{ $color->color}}</option>
            @else
            <option value="{{ $color->id}}">{{ $color->color}}</option>
            @endif

            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Ukuran</label>
        <select name="size_id" class="form-select @error('size_id') is-invalid

        @enderror" >
            <option value="">Pilih Ukuran</option>
            @foreach ($sizes as $size)
            @if (old('size_id',$sepatus->color_id) == $size->id)
            <option value="{{ $size->id}}" selected>{{ $size->size}}</option>
            @else
            <option value="{{ $size->id}}">{{ $size->size}}</option>
            @endif

            @endforeach
        </select>
      </div>

      <div class="mb-3">
        <label for="stock" class="form-label">Stock</label>
        <input type="text" class="form-control @error('stock') is-invalid @enderror" name="stock" id="stock" value="{{ old('stock',$sepatus->stock) }}">
        @error('stock')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror

      </div>




      <div class="mb-3">

        <input type="submit" class="btn btn-primary" name="submit">
      </div>
</form>
</div>
</div>
@endsection
