@extends('layouts.main')
@section('content')
<title>Step-off</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <style>
        /* Gaya untuk judul */
        h1 {
            margin-top: 100px;
            text-align: left;
            margin-bottom: 20px;
        }
        /* heroes */
        .heroes {
            background-color: rgb(204, 204, 204);
            object-fit: cover;
            height: 700px;
            margin-bottom:100px;
            margin-top: 70px;
        }
        .isi-heroes{
            margin-top: 55px;
        }
        .gambar-heroes{
            margin-top: 55px
        }
        .list-page{
            width: 200px;
            height: 40px;
            background-color: white;
            text-align: center;
            text-justify: center;
            margin-left: 25px;
            border-radius: 5px;
            color: black;
            border-color: black;
        }
        a{
            text-decoration: none;
            color: black
        }

        /* Kontainer scrollable horizontal */
        .scrollable-container {
            overflow-x: auto;
            white-space: nowrap;
            padding: 10px 0;
            display: flex;
            justify-content: start;
            gap: 10px;
        }

        /* Produk */
        .product-card {
            flex: 0 0 18rem;
            max-width: 18rem;
            margin: 0 5px;
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
            display: flex;
            flex-direction: column;
            justify-content: space-between;
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
        /* BRANDS */
        .brands{
        }
        .solo-brand{
            cursor: pointer;
            border: 1px solid black;
            height: 65px;
            width: 180px;
            margin-right: 20px;
            align-content: center;
            justify-items: center;
            border-radius: 8px;
            background-color: #ccc
        }
        .group-brands{
            display: flex;
            text-align: center;
        }

        /* KATEGORI */
        .kategori {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .sex{
            display: flex;
        }

        .gambar-men, .gambar-women {
            position: relative;
            margin-bottom: 100px;
        }

        .gambar-men img, .gambar-women img {
            height: 820px;
            width: auto;
            border-radius: 10px;
        }
        .gambar-men img{
            margin-right: 40px;
        }

        .btn-kategori {
            position: absolute;
            bottom: 50%;
            left: 50%;
            transform: translate(-50%, 50%);
            background-color: black;
            color: white;
            width: 220px;
            height: 50px;
            opacity: 0;
            transition: opacity 0.3s ease;
            }
        .btn-kategori:hover{
            background-color: white;
        }
        .gambar-men:hover img, .gambar-women:hover img {
            filter: brightness(0.5);
        }

        .gambar-men:hover .btn-kategori, .gambar-women:hover .btn-kategori {
            opacity: 1;
        }
        
        /* LIST SEPATU */
        .list-sepatu{
        }
        .konten-list{
            display: flex;
            justify-content: center;
        }
        .isi-list{
            margin-right: 20px;
            cursor: pointer;
        }

    </style>

<body>
    <div class="container-fluid">
        {{-- HEROES --}}
        <div class="heroes">
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
                <div class="col-10 col-sm-8 col-lg-6 gambar-heroes">
                    <img src="/images/baner.jpg" class="d-block mx-lg-auto img-fluid mt-5" alt="Bootstrap Themes" width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6 isi-heroes">
                    <h1 class="display-5 fw-bold lh-1 mb-3 ms-4">Step-Off: Langkah Pasti untuk Gaya Terbaik!</h1>
                    <p class="lead ms-4">Temukan koleksi sepatu terkini yang dirancang untuk gaya dan kenyamanan maksimal. Dari sneakers kasual hingga sepatu formal, Step-Off menghadirkan beragam pilihan yang cocok untuk setiap kesempatan. Mulai perjalanan gaya Anda sekarang dan nikmati pengalaman berbelanja yang mudah, cepat, dan aman bersama kami.</p>
                    <div class="d-grid gap-2 list-page text-center">
                        <a href="/list">
                        <div class="mt-2">
                            List Sepatu
                        </div>
                    </a>
                    </div>
                </div>
            </div>
        </div>
        {{-- KATEGORI --}}
    <div class="kategori">
        <div class="sex">
            <div class="men">
                <div class="isi-men">
                    <div class="gambar-men me-4">
                        <img src="images/hiroyuku_sanada.jpg" alt="">
                        <div class="btn btn-kategori">
                            men
                        </div>
                    </div>
                </div>
            </div>
            <div class="women">
                <div class="isi-women">
                    <div class="gambar-women">
                        <img src="images/chelsea_islan.jpg" alt="">
                        <div class="btn btn-kategori">
                            women
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- BRANDS -->
        <div class="brands">
            <div class="group-brands">
                <div class="solo-brand">
                    <div class="text">
                        ADIDAS
                    </div>
                </div>
                <div class="solo-brand">
                    <div class="text">
                        ADIDAS
                    </div>
                </div>
                <div class="solo-brand">
                    <div class="text">
                        ADIDAS
                    </div>
                </div>
                <div class="solo-brand">
                    <div class="text">
                        ADIDAS
                    </div>
                </div>
                <div class="solo-brand">
                    <div class="text">
                        ADIDAS
                    </div>
                </div>
            </div>
        </div>


        <h1 class="d-inline">Our List of shoes</h1>

        <a href="{{ url('/list') }}" class="float-right text-dark font-weight-bold">Show All</a>

        <!-- LIST SEPATU -->
        <div class="list-sepatu">
            <div class="konten-list">
                <div class="isi-list">
                    <img src="/images/sepatu3.jpeg" alt="" height="300px" width="250px">
                    <h6>pria</h6>
                    <h5>sepatu ope</h5>
                    <h6>Rp. 400.000</h6>
                </div>
                <div class="isi-list">
                    <img src="/images/sepatu4.jpeg" alt="" height="300px" width="250px">
                    <h6>pria</h6>
                    <h5>sepatu wahyu</h5>
                    <h6>Rp. 400.000</h6>
                </div>
                <div class="isi-list">
                    <img src="/images/sepatu5.jpeg" alt="" height="300px" width="250px">
                    <h6>wanita</h6>
                    <h5>sepatu fauzan</h5>
                    <h6>Rp. 400.000</h6>
                </div>
                <div class="isi-list">
                    <img src="/images/sepatu5.jpeg" alt="" height="300px" width="250px">
                    <h6>wanita</h6>
                    <h5>sepatu fauzan</h5>
                    <h6>Rp. 400.000</h6>
                </div>
                <div class="isi-list">
                    <img src="/images/sepatu5.jpeg" alt="" height="300px" width="250px">
                    <h6>wanita</h6>
                    <h5>sepatu fauzan</h5>
                    <h6>Rp. 400.000</h6>
                </div>
            </div>
        </div>

        <div class="tes">
            {{-- @foreach ($sepatus->sizes as $size)
            <div class="tas">
                {{ $size->size }}
            </div>
            @endforeach --}}
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
