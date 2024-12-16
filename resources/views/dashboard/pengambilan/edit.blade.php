@extends('dashboard.layouts.main')
@section('content')

<h1>Edit Tipe Pengambilan</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="/dashboard/pengambilan/{{ $pengambilans->id }}" method="POST">
    @method('PUT')
    @csrf
    <div class="mb-3">
        <label for="metode" class="form-label">tipe pengambilan</label>
        <input type="text" class="form-control @error('pengambilans') is-invalid @enderror" id="metode" name="metode" value="{{ old('metode',$pengambilans->metode) }}" required>
        @error('metode')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="ongkir" class="form-label">Harga Ongkir</label>
        <input type="number" class="form-control @error('ongkir') is-invalid @enderror" id="ongkir" name="ongkir" value="{{ old('ongkir',$pengambilans->ongkir) }}" required>
        @error('ongkir')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>

</form>

@endsection
