@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Pemasukan</h1>
  </div>

  <div class="row">
    <div class="col-6">


<form action="/dashboard-income/{{$incomes->id}}" method="post" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" value="{{ old('nama',$incomes->nama) }}">
        @error('nama')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>

      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="text" class="form-control @error('harga') is-invalid @enderror" name="harga" id="harga" value="{{ old('harga',$incomes->harga) }}">
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
            @if (old('kategori_id',$incomes->kategori_id) == $kategori->id)
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
            <option value="">Pilih Merek</option>
            @foreach ($mereks as $merek)
            @if (old('brands_id',$incomes->merek_id) == $merek->id)
            <option value="{{ $merek->id}}" selected>{{ $merek->nama_brand}}</option>
            @else
            <option value="{{ $merek->id}}">{{ $merek->nama_brand}}</option>
            @endif

            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label class="form-label">Size</label>
        <select name="size_id" class="form-select @error('size_id') is-invalid

        @enderror" >
            <option value="">Pilih Size</option>
            @foreach ($sizes as $size)
            @if (old('size_id',$incomes->size_id) == $size->id)
            <option value="{{ $size->id}}" selected>{{ $size->size}}</option>
            @else
            <option value="{{ $size->id}}">{{ $size->size}}</option>
            @endif

            @endforeach
        </select>
      </div>
      <div class="mb-3">
        <label for="jumlah" class="form-label">Jumlah</label>
        <input type="text" class="form-control @error('jumlah') is-invalid @enderror" name="jumlah" id="jumlah" value="{{ old('jumlah',$incomes->jumlah) }}">
        @error('jumlah')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="total" class="form-label">Total</label>
        <input type="text" class="form-control @error('total') is-invalid @enderror" name="total" id="total" value="{{ old('total',$incomes->total) }}">
        @error('total')
           <div class="invalid-feedback">
            {{ $message }}
           </div>
         @enderror
      </div>
      <div class="mb-3">
        <label for="tanggal" class="form-label">Tanggal</label>
        <input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal" value="{{ old('tanggal',$incomes->tanggal) }}">
        @error('tanggal')
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
