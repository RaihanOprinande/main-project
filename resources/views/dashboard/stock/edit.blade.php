@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h1>Update Sepatu Size</h1>

    <form action="/dashboard-stock/{{ $sepatuSize }}" method="POST">
        @method('PUT')
        @csrf

        <div class="form-group">
            <label for="sepatu">Select Sepatu:</label>
            <select name="sepatu_id" id="sepatu" class="form-control" required>
                <option value="">-- Pilih Sepatu --</option>
                @foreach ($sepatus as $sepatu)
                    <option value="{{ $sepatu->id }}" {{ old('sepatu_id', $sepatuSize->sepatu_id) == $sepatu->id ? 'selected' : '' }}>{{ $sepatu->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="size">Select Size:</label>
            <select name="size_id" id="size" class="form-control" required>
                <option value="">-- Pilih Size --</option>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}" {{ old('size_id', $sepatuSize->size_id) == $size->id ? 'selected' : '' }}>{{ $size->size }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" required min="1" value="{{ old('quantity', $sepatuSize->quantity) }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
