@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
        .product {
            width: 30%;
            text-align: center;
            margin-bottom: 20px;
        }
        .product img {
            width: 100%;
            height: auto;
        }
        /* Style link */
        .product a {
            text-decoration: none; /* Menghilangkan garis bawah link */
            color: black; /* Mengubah warna teks link menjadi hitam */
        }
        .product a:hover {
            color: gray; /* Opsional: Mengubah warna saat link di-hover */
        }
    </style>
</head>
<body>
    <h1>All New, Perfect For You</h1>
    <div class="container">
        @foreach($sepatus as $sepatu)
            <div class="product">
                <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}">
                    <img src="{{ asset('images/' . $sepatu->gambar) }}" alt="{{ $sepatu->nama }}">
                    <h2>{{ $sepatu->nama }}</h2>
                    <p>{{ $sepatu->kategori }}</p>
                <p>Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
                </a>

            </div>
        @endforeach
    </div>
</body>
</html>
@endsection     
