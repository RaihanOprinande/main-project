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

        /* Menambahkan gaya untuk judul */
        h1 {
            margin-top: 100px;
            text-align: left; /* Menjajarkan judul ke kiri */
            margin-bottom: 20px; /* Menambahkan jarak bawah untuk judul */
        }

        /* Gaya untuk banner */
        .banner {
            width: 100%; /* Lebar banner 100% dari kontainer */
            height: 100vh; /* Tinggi banner 100% dari tinggi viewport */
            object-fit: cover; /* Memastikan gambar terpotong dengan proporsional */
        }

        /* Kontainer scrollable horizontal */
        .scrollable-container {
            overflow-x: auto; /* Menambahkan scroll horizontal */
            white-space: nowrap; /* Mencegah card berpindah baris */
            padding: 10px 0; /* Padding vertikal untuk ruang lebih */
            display: flex; /* Menggunakan flexbox */
        }

        /* Produk */
        .product-card {
            flex: 1; /* Menjadikan semua card memiliki ukuran yang sama */
            min-width: 18rem; /* Lebar minimum card */
            margin: 0 10px; /* Jarak antar card */
            border: 2px solid #ccc; /* Menambahkan border */
            border-radius: 8px; /* Mengatur sudut border */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Menambahkan efek bayangan */
            transition: transform 0.2s; /* Animasi transformasi */
            display: flex; /* Menggunakan flexbox untuk card */
            flex-direction: column; /* Mengatur card secara kolom */
        }

        /* Efek hover pada card */
        .product-card:hover {
            transform: scale(1.05); /* Efek pembesaran saat hover */
        }

        /* Mengubah warna teks dalam card */
        .card-body {
            color: black; /* Mengatur warna teks dalam card menjadi hitam */
            flex-grow: 1; /* Membiarkan card body tumbuh mengisi ruang */
        }

        /* Mengubah warna link di dalam card */
        .card a {
            color: black; /* Menghilangkan warna biru pada link */
            text-decoration: none; /* Menghilangkan garis bawah pada link */
        }

        /* Efek hover pada link */
        .card a:hover {
            text-decoration: none; /* Garis bawah saat hover */
            color: gray; /* Warna saat hover */
        }
    </style>
</head>
<body>


    <div class="container">
        <!-- Carousel Banner Gambar -->
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel" data-interval="2000"> <!-- Atur interval di sini -->
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('images/baner.jpg') }}" alt="Banner 1" class="banner"> <!-- Ganti dengan gambar banner 1 -->
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/baner2.jpg') }}" alt="Banner 2" class="banner"> <!-- Ganti dengan gambar banner 2 -->
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

        {{-- // resources/views/card.blade.php --}}

{{-- <div class="card" style="width: 18rem;">
    <img src="{{ asset('images/baner.jpg') }}" class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $description }}</p>
        <a href="#" class="btn btn-primary">Shop Now</a>
    </div>
</div> --}}

        <h1>All New, Perfect For You</h1>

        <div class="scrollable-container">
            @foreach($sepatus as $sepatu)
                <div class="product-card"> <!-- Menggunakan grid Bootstrap -->
                    <div class="card flex-fill"> <!-- Menggunakan flex-fill untuk mengisi ruang -->
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
