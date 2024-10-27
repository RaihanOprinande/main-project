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
                @foreach([6, 6.5, 7, 7.5, 8, 8.5, 9] as $size)
                    <label>

                        <input type="radio" name="size" value="{{ $size }}"> {{ $size }}
                    </label>
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
</body>
</html>
@endsection
