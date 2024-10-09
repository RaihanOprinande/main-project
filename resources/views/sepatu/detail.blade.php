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
        .container {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
        }
        .product img {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-bottom: 20px;
        }
        .product h1 {
            font-size: 2em;
            margin-bottom: 10px;
        }
        .product p {
            font-size: 1.2em;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="product">
            <h1>{{ $sepatu->nama }}</h1>
            <img src="{{ asset('images/' . $sepatu->gambar) }}" alt="{{ $sepatu->nama }}">

            <p>Kategori: {{ $sepatu->kategori }}</p>
            <p>Harga: Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>

        </div>
        <a href="{{ route('sepatu.home') }}">Kembali ke Daftar Sepatu</a> <!-- Tombol kembali ke halaman utama -->
    </div>
</body>
</html>
@endsection
