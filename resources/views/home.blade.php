@extends('layouts.main')
@section('content')
<title>Step-off</title>
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    <link rel="stylesheet" href="/css/home.css">

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
                    <p class="lead ms-4">Step-off with style</p>
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
            <div class="men me-4">
                <div class="isi-men">
                    <div class="gambar-men ">
                        <a href="{{ route('sepatu.kategori', ['kategori' => '1']) }}">
                            <img src="/images/hiroyuki_Sanada.jpg" alt="">
                            <div class="text-kategori">
                                view men's shoes
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="women">
                <div class="isi-women">
                    <div class="gambar-women">
                        <a href="{{ route('sepatu.kategori', ['kategori' => '2']) }}">
                            <img src="/images/miki_matsubara.jpeg" alt="">
                            <div class="text-kategori">
                                view women's shoes
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

        <!-- BRANDS -->
        {{-- <a href="{{ route('/sepatu' }}"> --}}

        </a>
        <div class="brands">
            <div class="group-brands">
             @foreach ($mereks as $brand )
             <a href="/merek/{{ $brand->id }}/sepatu">
                <div class="solo-brand">
                    <div class="text-uppercase">
                        {{ ($brand->nama_brand) }}
                    </div>
                </div>
            @endforeach
            </div>
        </div>


        <h1 class="text-center mb-5">Our List of shoes</h1>

        {{-- <a href="{{ url('/list') }}" class="float-right text-dark font-weight-bold">Show All</a> --}}

        <!-- LIST SEPATU -->
        {{-- <div class="row mt-5">
            @foreach($sepatus->take(4) as $sepatu) <!-- Mengambil 4 item pertama -->
                <div class="col-md-3 col-sm-6 mb-4" {{ $sepatu->stock > 0 ? '' : 'disabled-card' }}>
                    <div class="card h-100" >
                        <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}">
                            <img src="{{ asset('images/' . $sepatu-> gambar_sepatu) }}" class="card-img-top" alt="{{ $sepatu-> nama }}">
                            <div class="card-body" >
                                <h5 class="card-title">{{ $sepatu->nama }}</h5>
                                <p class="card-text">{{ $sepatu-> kategori->nama }}
                                </p></p>
                                <p>Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div> --}}
        <div class="list-sepatu">
            <div class="konten-list ">
                @foreach ($sepatus->take(5) as $sepatu)
                <a href="/sepatu/{{ $sepatu->id }}">
                <div class="isi-list ">
                        <img src="{{ asset('images/' . $sepatu-> gambar_sepatu) }}" alt="{{ $sepatu-> nama_sepatu}}" height="300px" width="250px">
                        <h6 class="ms-1">{{ $sepatu->kategori->nama }}</h6>
                        <h5 class="ms-1">{{ $sepatu->nama }}</h5>
                        <h6 class="ms-1">RP {{ number_format($sepatu->harga, 0, ',','.') }}</h6>
                    </div>
                </a>
                @endforeach
                {{-- <div class="isi-list">
                    <img src="/images/sepatu4.jpeg" alt="" height="300px" width="250px">
                    <h6 class="ms-1">pria</h6>
                    <h5 class="ms-1">sepatu wahyu</h5>
                    <h6 class="ms-1">Rp. 400.000</h6>
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
                    <h5>sepatu si anu</h5>
                    <h6>Rp. 400.000</h6>
                </div>
                <div class="isi-list">
                    <img src="/images/sepatu5.jpeg" alt="" height="300px" width="250px">
                    <h6>wanita</h6>
                    <h5>sepatu si ini</h5>
                    <h6>Rp. 400.000</h6>
                </div> --}}
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
