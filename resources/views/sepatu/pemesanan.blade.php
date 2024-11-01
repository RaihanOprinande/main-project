@extends('layouts.main')
@section('content')
    <style>
        /* Styling untuk memusatkan konten */
        .detail-container {
            max-width: 600px; /* Lebar maksimal untuk detail */
            margin: 50px auto; /* Margin atas dan bawah, auto untuk tengah */
            padding: 20px; /* Padding di dalam kontainer */
            background-color: #fff; /* Warna latar belakang putih */
            border-radius: 10px; /* Sudut melengkung */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Bayangan untuk efek 3D */
            text-align: center; /* Teks di tengah */
        }

        h1 {
            margin-bottom: 20px; /* Jarak bawah untuk judul */
        }

        p {
            margin: 10px 0; /* Jarak vertikal untuk paragraf */
        }

        .btn {
            margin-top: 20px; /* Jarak atas untuk tombol */
            display: inline-block; /* Agar tombol terlihat lebih baik */
            padding: 10px 20px; /* Padding dalam tombol */
            background-color: #000; /* Warna latar belakang tombol */
            color: #fff; /* Warna teks tombol */
            text-decoration: none; /* Menghapus garis bawah */
            border-radius: 5px; /* Sudut tombol melengkung */
        }

        .btn:hover {
            background-color: #333; /* Warna tombol saat hover */
        }

        .upload-container {
            margin-top: 20px; /* Jarak atas untuk kontainer upload */
        }

        input[type="file"] {
            margin-top: 10px; /* Jarak atas untuk input file */
        }

        .action-buttons {
            margin-top: 20px; /* Jarak atas untuk kontainer tombol aksi */
            display: flex; /* Menggunakan flexbox untuk menata tombol */
            justify-content: center; /* Mengatur tombol di tengah */
            gap: 20px; /* Jarak antara tombol */
        }
    </style>

    <div class="detail-container">
        <h1>Detail Pemesanan</h1>
        <p>Sepatu: {{ $sepatu->nama }}</p>
        <p>Harga per Unit: Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
        <p>Jumlah: {{ $jumlah }}</p>
        <p>Warna: {{ $warna }}</p>
        <p>Ukuran: {{ $ukuran }}</p>
        <p>Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>

        <p>No Rekening Pemilik: <strong>5434 0100 3078 521</strong><br>
        Atas Nama: <strong>M WAHYU FIKRI</strong></p>

        <div class="upload-container">
            <h4>Upload Bukti Transfer:</h4>
            <form action="{{ route('upload.bukti') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="file" name="bukti_transfer" accept="image/*" required>
                <button type="submit" class="btn">Upload</button>
            </form>
        </div>

        <div class="action-buttons">
            <form action="{{ route('proses.bayar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="id" value="{{ $sepatu->id }}">
                <button type="submit" class="btn">Konfirmasi</button>
            </form>

            <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}" class="btn">Kembali</a>

        </div>
    </div>
@endsection
