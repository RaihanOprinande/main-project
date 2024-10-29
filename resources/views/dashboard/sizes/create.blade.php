<!-- resources/views/dashboard/sizes/create.blade.php -->

@extends('dashboard.layouts.main')
@section('content')

<h1>Tambah Ukuran</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('dashboard-sizes.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="size" class="form-label">Pilih Ukuran</label>
        <input type="text" class="form-control @error('size') is-invalid @enderror" id="size" name="size" value="{{ old('size') }}" required>
        @error('size')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Simpan Ukuran</button>
    <a href="{{ route('dashboard-sizes.index') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection
