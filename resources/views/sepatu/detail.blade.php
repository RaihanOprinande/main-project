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
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 1200px;
            margin: 50px auto;
            display: flex;
            gap: 20px;
        }

        /* Image Section */
        .image-section {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-section img {
            width: 100%;
            max-width: 450px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        /* Details Section */
        .details-section {
            flex: 1;
            padding: 40px;
            border-radius: 10px;
        }

        .details-section h1 {
            font-size: 28px;
            margin-bottom: 10px;
            font-weight: bold;
        }

        .details-section p {
            font-size: 18px;
            margin-bottom: 20px;
            color: #666;
        }

        .price {
            font-size: 22px;
            color: #333;
            margin-bottom: 20px;
        }

        .selection, .color-selection {
            margin-bottom: 30px;
        }

        .selection h4, .color-selection h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .selection input, .color-selection input {
            margin-right: 10px;
        }

<<<<<<< HEAD
        .size-selection {
            flex-wrap: wrap;
        }

        .size-selection label {
=======
        .selection {
            /* display: flex; */
            flex-wrap: wrap;
        }

        .selection {
            margin-bottom: 30px;
        }

        .selection h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }

        .selection label {
>>>>>>> 5f89ed4c73b6ed4659f2fca3036a7660e66f6fc7
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #c5c5c5;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s, border-color 0.3s;
            width: 20%;
            text-align: center;
            margin-bottom: 10px;
        }

        .selection input[type="radio"] {
            display: none;
        }

        .selection input[type="radio"]:checked + label {
            background-color: #000000;
            color: #ffffff;
            border-color: #f8f8f8;
        }

<<<<<<< HEAD
        .size-selection label:hover {
=======
        .selection label:hover {
            /* background-color: #e0e0e0; */
>>>>>>> 5f89ed4c73b6ed4659f2fca3036a7660e66f6fc7
            border-color: #000000;
        }

        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px; /* Tambahan jarak antara tombol Add to Bag dan input jumlah */
        }

        .btn:hover {
            background-color: #333;
        }

        .quantity-selection {
            margin-top: 20px;
            font-size: 18px;
        }

        .quantity-container {
            display: flex;
            align-items: center;
        }

        .quantity-btn {
            padding: 10px 15px;
            font-size: 18px;
            cursor: pointer;
            border: 1px solid #ccc;
            background-color: #f0f0f0;
        }

        .quantity-btn:hover {
            background-color: #e0e0e0;
        }

        #quantity {
            width: 50px;
            text-align: center;
            font-size: 18px;
            border: none;
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Image Section -->
        <div class="image-section">
            <img src="{{ asset('images/' . $sepatu->gambar->gambar_sepatu) }}" alt="{{ $sepatu->nama }}">
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <h1>{{ $sepatu->nama }}</h1>
            <p>Kategori: {{ $sepatu->kategori->nama }}</p>
            <p class="price">Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>

            <!-- Size Selection -->

            <div class="selection">
                <h4>Select Size:</h4>

                @foreach ($sizes as $size)
    @php
        $isAvailable = $stocks->contains(function ($stock) use ($size, $sepatu) {
            return $stock->size_id == $size->id && $stock->kode_sepatu == $sepatu->kode_sepatu;
        });
    @endphp

    <input type="radio" name="size" id="size{{ $size->id }}" value="{{ $size->size }}" {{ $isAvailable ? '' : 'disabled' }}>
    <label for="size{{ $size->id }}" style="{{ $isAvailable ? '' : 'color: gray;' }}">{{ $size->size }}</label>
@endforeach

            </div>

            <!-- Color Selection -->
            <div class="color-selection">
                <h4>Available Colors:</h4>
                <label><input type="radio" name="color" value="White">White</label>
                <label><input type="radio" name="color" value="Black">Black</label>
                <label><input type="radio" name="color" value="Red">Red</label>
            </div>

            <!-- Quantity Selection -->
            <div class="quantity-selection">
                <h4>Select Quantity:</h4>
                <div class="quantity-container">
                    <button type="button" onclick="decreaseQuantity()" class="quantity-btn">-</button>
                    <input type="text" id="quantity" name="quantity" value="1" readonly>
                    <button type="button" onclick="increaseQuantity()" class="quantity-btn">+</button>
                </div>
            </div>

            <!-- Add to Bag Button -->
            <!-- Add to Bag Button -->
            <form action="{{ route('pemesanan') }}" method="POST">
                @csrf
                <input type="hidden" name="sepatu_id" value="{{ $sepatu->id }}">
                <input type="hidden" name="jumlah" id="form_quantity" value="1">
                <input type="hidden" name="warna" id="form_color" value="">
                <input type="hidden" name="ukuran" id="form_size" value="">

                <button type="submit" class="btn" id="orderButton" disabled>Order Now</button>
            </form>




            <!-- Back to List Button -->
            <a href="{{ route('sepatu.home') }}" class="btn">Kembali ke Daftar Sepatu</a>
        </div>
    </div>

    <!-- JavaScript untuk kontrol jumlah -->
    <script>

        function decreaseQuantity() {
    let quantityInput = document.getElementById('quantity');
    let formQuantityInput = document.getElementById('form_quantity');
    let currentQuantity = parseInt(quantityInput.value);
    if (currentQuantity > 1) {
        quantityInput.value = currentQuantity - 1;
        formQuantityInput.value = currentQuantity - 1;
    }
}

function increaseQuantity() {
    let quantityInput = document.getElementById('quantity');
    let formQuantityInput = document.getElementById('form_quantity');
    let currentQuantity = parseInt(quantityInput.value);
    quantityInput.value = currentQuantity + 1;
    formQuantityInput.value = currentQuantity + 1;
}

document.querySelectorAll('input[name="color"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        document.getElementById('form_color').value = this.value;
    });
});

document.querySelectorAll('input[name="size"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        document.getElementById('form_size').value = this.value; // Mengambil ID size
        validateForm(); // Cek validitas saat ukuran dipilih
    });
});



function disableOrderButton() {
    document.getElementById('orderButton').disabled = true; // Nonaktifkan tombol
}

// Validasi pemilihan ukuran dan warna
function validateForm() {
    const selectedColor = document.querySelector('input[name="color"]:checked');
    const selectedSize = document.querySelector('input[name="size"]:checked');

    const orderButton = document.getElementById('orderButton');

    // Aktifkan tombol jika ukuran dan warna dipilih
    if (selectedColor && selectedSize) {
        orderButton.disabled = false; // Aktifkan tombol
    } else {
        orderButton.disabled = true; // Nonaktifkan tombol
    }
}

// Event listener untuk memperbarui tombol saat ukuran dan warna dipilih
document.querySelectorAll('input[name="color"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        document.getElementById('form_color').value = this.value;
        validateForm(); // Cek validitas saat warna dipilih
    });
});

document.querySelectorAll('input[name="size"]').forEach((radio) => {
    radio.addEventListener('change', function () {
        document.getElementById('form_size').value = this.value; // Mengambil ID size
        validateForm(); // Cek validitas saat ukuran dipilih
    });
});


// Nonaktifkan tombol "Order Now" saat halaman dimuat
document.addEventListener('DOMContentLoaded', function () {
    disableOrderButton(); // Pastikan tombol dinonaktifkan saat halaman dimuat
});



    </script>
</body>
</html>
@endsection
