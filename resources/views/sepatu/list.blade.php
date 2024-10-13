@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->
    <style>
        /* Kontainer utama */
        .container {
            padding-top: 50px;
            padding-bottom: 50px;
        }

        h1 {
            margin-bottom: 30px;
            text-align: center;
        }

        /* Produk */
        .product-card {
            margin-bottom: 20px; /* Jarak bawah antar card */
            border: 2px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .product-card:hover {
            transform: scale(1.05); /* Efek hover */
        }

        .card-body {
            color: black;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card a {
            color: black;
            text-decoration: none;
        }

        .card a:hover {
            color: gray;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>All New, Perfect For You</h1>

        <!-- Row Bootstrap untuk grid card -->
        <div class="row">
            @foreach($sepatus as $sepatu)
                <div class="col-md-3 col-sm-6"> <!-- Setiap card 1/4 lebar pada md, 1/2 pada sm -->
                    <div class="product-card card">
                        <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}">
                            <img src="{{ asset('images/' . $sepatu->gambar) }}" class="card-img-top" alt="{{ $sepatu->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sepatu->nama }}</h5>
                                <p class="card-text">{{ $sepatu->kategori }}</p>
                                <p>Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
