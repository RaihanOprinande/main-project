@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h1>Edit Sepatu Size</h1>

    <form action="/dashboard-stock/{{ $stocks->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="sepatu">Select Sepatu:</label>
            <select name="sepatu_id" id="sepatu" class="form-control" required>
                <option value="">-- Pilih Sepatu --</option>
                @foreach ($sepatus as $sepatu)
                @if (old('sepatu_id',$stocks->sepatu_id) == $sepatu->id)
                    <option value="{{ $sepatu->id }}" selected>{{ $stocks->sepatus->nama }}</option>
                @else
                    <option value="{{ $sepatu->id }}">{{ $sepatu->nama }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="size">Select Size:</label>
            <select name="Size_id" id="size" class="form-control" required>
                <option value="">-- Pilih Size --</option>
                @foreach ($sizes as $size)
                @if (old('size_id',$stocks->size_id) == $size->id)
                    <option value="{{ $size->id }}" selected>{{ $stocks->sizes->size }}</option>
                @else
                    <option value="{{ $size->id }}">{{ $size->nama }}</option>
                @endif
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror" value="{{ old('quantity',$stocks->quantity) }}" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
