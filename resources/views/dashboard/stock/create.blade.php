@extends('dashboard.layouts.main')

@section('content')
<div class="container">
    <h1>Create Sepatu Size</h1>

    <form action="/dashboard-stock" method="POST">
        @csrf

        <div class="form-group">
            <label for="sepatu">Select Sepatu:</label>
            <select name="sepatu_id" id="sepatu" class="form-control" required>
                <option value="">-- Pilih Sepatu --</option>
                @foreach ($sepatus as $sepatu)
                    <option value="{{ $sepatu->id }}">{{ $sepatu->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="size">Select Size:</label>
            <select name="size_id" id="size" class="form-control" required>
                <option value="">-- Pilih Size --</option>
                @foreach ($sizes as $size)
                    <option value="{{ $size->id }}">{{ $size->size }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" name="quantity" class="form-control" required min="1">
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
