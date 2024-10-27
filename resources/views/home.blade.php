@extends('layouts.main')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Landing Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Menambahkan Bootstrap -->
    <style>
        /* Kontainer utama */
        .container {
            width: 100%; /* Mengambil seluruh lebar kontainer induk */
            padding: 0; /* Menghilangkan padding untuk mencapai tepi */
        }

        /* Gaya untuk judul */
        h1 {
            margin-top: 100px;
            text-align: left;
            margin-bottom: 20px;
        }

        /* Banner */
        .banner {
            width: 100%;
            height: 100vh;
            object-fit: cover;
        }

        /* Kontainer scrollable horizontal */
        .scrollable-container {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px 0;
            display: flex;
            justify-content: start; /* Agar item tersusun di awal */
            gap: 10px; /* Menambah jarak antar-card */
        }

        /* Produk */
        .product-card {
            flex: 0 0 18rem; /* Memastikan card tidak berubah ukuran */
            max-width: 18rem; /* Membatasi lebar maksimum */
            margin: 0 5px; /* Menambahkan margin */
            border: 2px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            overflow: hidden;
            max-height: 440px;
        }

        /* Konten dalam card */
        .card-body {
            color: black;
            flex-grow: 1;
            display: flex; /* Membuat card-body menjadi flex container */
            flex-direction: column; /* Susunan vertikal */
            justify-content: space-between; /* Memberikan jarak antar elemen */
            overflow: hidden;
        }

        .card-title {
            margin-bottom: 0; /* Menghilangkan margin bawah */
        }

        .product-card:hover {
            transform: scale(1.05);
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
        <!-- Carousel Banner Gambar -->
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/baner3.jpg') }}" alt="Banner 1" class="banner">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/baner4.jpg') }}" alt="Banner 2" class="banner">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

        <h1>All New, Perfect For You</h1>

        <!-- Scrollable Horizontal Container -->
        <div class="scrollable-container">
            @foreach($mereks as $merek)
                <div class="product-card">
                    <div class="card flex-fill">
                        <a href="{{ route('sepatu.byMerek', ['id' => $merek->id]) }}">
                            <img src="{{ asset('images/' . $merek->gambar) }}" class="card-img-top" alt="{{ $merek->nama_merek }}">
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <br>
        <br>
        <h1 class="d-inline">See, What's New</h1>

        <a href="{{ url('/list') }}" class="btn btn-link float-right text-dark font-weight-bold">Show All</a>

        <!-- Baris Card Vertikal Tambahan -->
        <div class="row mt-5">
            @foreach($sepatus->take(4) as $sepatu) <!-- Mengambil 4 item pertama -->
                <div class="col-md-3 col-sm-6 mb-4">
                    <div class="card h-100">
                        <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}">
                            <img src="{{ asset('images/' . $sepatu-> gambar->gambar_sepatu) }}" class="card-img-top" alt="{{ $sepatu-> gambar->gambar_sepatu }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $sepatu->nama }}</h5>
                                <p class="card-text">{{ $sepatu-> kategori->nama }}
                                </p></p>
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
