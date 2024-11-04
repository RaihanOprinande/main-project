@extends('layouts.main')
@section('content')
    <style>
        /* Styling untuk memusatkan konten */
        .detail-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        p {
            margin: 10px 0;
        }

        .btn {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: #333;
        }

        .upload-container {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }

        .upload-container label {
            margin-right: 10px;
        }

        input[type="file"] {
            flex: 1;
        }

        .action-buttons {
            margin-top: 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }
    </style>

    <div class="detail-container">
        <tr>
            <th>No</th>
            <th>Shoes</th>
            <th>Harga</th>
            <th>Kategori</th>
            <th>Merek</th>
            <th>Sizes</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>

        <tr>
            <th>{{ $sepatu->gambar_sepatu }}</th>
        </tr>
        <h1>Detail Pemesanan</h1>
        <p>Sepatu: {{ $sepatu->nama }}</p>
        <p>Harga per Unit: Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>
        <p>Jumlah: {{ $jumlah }}</p>
        <p>Warna: {{ $warna }}</p>
        <p>Ukuran: {{ $ukuran }}</p>
        <p>Total Harga: Rp {{ number_format($totalHarga, 0, ',', '.') }}</p>

        <p>No Rekening Pemilik: <strong>5434 0100 3078 521</strong><br>
        Atas Nama: <strong>M WAHYU FIKRI</strong></p>

        <form action="{{ route('proses.bayar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ $sepatu->id }}">
            <input type="hidden" name="harga" value="{{ $sepatu->harga }}">
            <input type="hidden" name="jumlah" value="{{ $jumlah }}">
            <input type="hidden" name="warna" value="{{ $sepatu->color_id }}">
            <input type="hidden" name="ukuran" value="{{ $sepatu->size_id }}">
            <input type="hidden" name="totalHarga" value="{{ $totalHarga }}">

            <div class="upload-container">
                <label for="bukti" class="form-label">Upload Bukti :</label>
                <input type="file" accept="image/*" class="form-control @error('bukti') is-invalid @enderror" id="bukti" name="bukti" required>
                @error('bukti')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="action-buttons">
                <button type="submit" class="btn">Konfirmasi</button>
                <a href="{{ route('sepatu.detail', ['id' => $sepatu->id]) }}" class="btn">Kembali</a>
            </div>
        </form>
    </div>
@endsection
