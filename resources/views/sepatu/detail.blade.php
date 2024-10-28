<!-- resources/views/sepatu/detail.blade.php -->
@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Sepatu</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            gap: 20px;
        }

        /* Image Section */
        .image-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-section img {
            width: 100%;
            max-width: 450px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Details Section */
        .details-section {
            flex: 1;
            /* background-color: #fff; */
            padding: 40px;
            border-radius: 10px;
            /* box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); */
        }

        .details-section h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .details-section p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666;
        }

        .price {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
        }

        .size-selection, .color-selection {
            margin-bottom: 30px;
        }

        .size-selection h4, .color-selection h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .size-selection input, .color-selection input {
            margin-right: 10px;

        }

        .size-selection {
            /* display: flex; */
            flex-wrap: wrap;
        }

        .size-selection {
            margin-bottom: 30px;
        }

        .size-selection h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .size-selection label {
            display: inline-block;
            padding: 10px 20px;
            /* background-color: #f0f0f0; */
            border: 1px solid transparent;
            border-color: #c5c5c5;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s, border-color 0.3s;
            width: 20%;
            text-align: center;
            margin-bottom: 10px;
        }

        .size-selection input[type="radio"] {
            display: none;
        }

        .size-selection input[type="radio"]:checked + label {
            background-color: #000000;
            color: #ffffff;
            border-color: #f8f8f8;
        }

        .size-selection label:hover {
            /* background-color: #e0e0e0; */
            border-color: #000000;
        }
        .size-tersedia {
            display: flex;
            flex-wrap: wrap;
            /* margin-right: 40px; */
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #333;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            text-decoration: none;
            color: #333;
            font-size: 16px;
        }
    </style>
</head>
<body>
    {{-- @foreach ($stocks as $shoe ) --}}
    <div class="container">
        <!-- Image Section -->
        <div class="image-section">
            <img src="{{ asset('images/' . $sepatu->gambar->gambar_sepatu) }}" alt="{{ $sepatu->nama }}">
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <h1>{{ $sepatu->nama }}</h1>
            <p>Kategori: {{ $sepatu->kategori->nama }}</p>
            <p class="price">Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>

            <!-- Size Selection -->

            <div class="size-selection">
                <h4>Select Size:</h4>
                <p>Size yang tersedia:</p>
                <div class="size-tersedia">
                    @foreach ($stocks as $ent)
                        <p>{{ $ent->size->size }}</p>
                    @endforeach
                </div>
                @foreach ($sizes as $size)
                    @php
                        // Cek apakah ukuran ini ada dalam stok
                        $isAvailable = $stocks->contains(function ($stock) use ($size) {
                            return $stock->size_id == $size->id && $stock->stock > 0;
                        });
                    @endphp
                    <input type="radio" name="size" id="size{{ $size->id }}" value="{{ $size->id }}" {{ $isAvailable ? '' : 'disabled' }}>
                    <label for="size{{ $size->id }}" style="{{ $isAvailable ? '' : 'color: gray;' }}">{{ $size->size }}</label>
                @endforeach
            </div>

            <!-- Color Selection -->
            <div class="color-selection">
                <h4>Available Colors:</h4>
                <label><input type="radio" name="color" value="White">White</label>
                <label><input type="radio" name="color" value="Black">Black</label>
                <label><input type="radio" name="color" value="Red">Red</label>
            </div>

            <!-- Add to Bag Button -->
            <a href="#" class="btn">Add to Bag</a>

            <!-- Back to List Button -->
            <a href="{{ route('sepatu.home') }}" class="btn">Kembali ke Daftar Sepatu</a>
        </div>
    </div>
    {{-- @endforeach --}}
</body>
</html>
@endsection
