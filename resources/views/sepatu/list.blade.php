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
            flex-grow: 1;
            display: flex; /* Membuat card-body menjadi flex container */
            flex-direction: column; /* Susunan vertikal */
            justify-content: space-between; /* Memberikan jarak antar elemen */
            overflow: hidden;
        }

        .card a {
            color: black;
            text-decoration: none;
        }

        .card a:hover {
            color: gray;
        }
        .card-title {
            margin-bottom: 0; /* Menghilangkan margin bawah */
        }

    </style>
</head>
<body>
    <div class="container">


        <!-- Row Bootstrap untuk grid card -->
        <div class="row">
            @forelse($sepatus as $sepatu)
                <div class="col-md-3 col-sm-6"> <!-- Setiap card 1/4 lebar pada md, 1/2 pada sm -->
                    <div class="product-card card">
                        <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}">
                            <img src="{{ asset('images/' . $sepatu->sepatu_gambar) }}" class="card-img-top" alt="{{ $sepatu->nama }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sepatu-> sepatu_gambar }}</h5>
                                <p class="card-text">{{ $sepatu-> kategori->nama }}</p>
                                <p>Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @empty
                <!-- Pesan jika data tidak ditemukan -->
                <div class="col-12 text-center">
                    <div class="alert">
                        <h4>Data tidak ditemukan</h4>
                        <p>Sepatu dengan kategori atau nama yang dicari tidak tersedia.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
