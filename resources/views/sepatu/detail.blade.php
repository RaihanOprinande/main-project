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
            margin: 0;
            padding: 0;
        }
        .container {
            margin: 50px auto;
            display: flex;
        }
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
        .size-selection, .color-selection {
            margin-bottom: 30px;
        }
        .size-selection h4, .color-selection h4 {
            font-size: 18px;
            margin-bottom: 10px;
        }
        .size-selection input, .color-selection input {
            margin-right: 10px;
        }
        .size-selection label, .color-selection label {
            display: inline-block;
            padding: 10px 20px;
            border: 1px solid #c5c5c5;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
            transition: background-color 0.3s, border-color 0.3s;
            text-align: center;
            margin-bottom: 10px;
        }
        .size-selection input[type="radio"], .color-selection input[type="radio"] {
            display: none;
        }
        .size-selection input[type="radio"]:checked + label,
        .color-selection input[type="radio"]:checked + label {
            background-color: #000000;
            color: #ffffff;
            border-color: #f8f8f8;
        }
        .btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .btn:disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
        .btn:not(:disabled):hover {
            background-color: #444;
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
            <img src="{{ asset('storage/' . $sepatu->gambar_sepatu) }}" alt="">
        </div>

        <!-- Details Section -->
        <div class="details-section">
            <h1>{{ $sepatu->nama }}</h1>
            <p>{{ $sepatu->brands->nama_brand }}</p>
            <p>Kategori: {{ $sepatu->kategori->nama }}</p>
            <p class="price">Rp {{ number_format($sepatu->harga, 0, ',', '.') }}</p>

            <!-- Size Selection -->
            <div class="size-selection">
                <h4>Select Size:</h4>
                @foreach ($sepatu->sizes as $size)
                    <input type="radio" name="size" id="size{{ $size->id }}" value="{{ $size->id }}">
                    <label for="size{{ $size->id }}">{{ $size->size }}</label>
                @endforeach
            </div>

            <!-- Color Selection -->


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
            <form action="{{ route('pemesanan') }}" method="POST">
                @csrf
                <input type="hidden" name="sepatu_id" value="{{ $sepatu->id }}">
                <input type="hidden" name="jumlah" id="form_quantity" value="1">
                <input type="hidden" name="size" id="form_size">


                <button type="submit" class="btn" id="orderButton" disabled>Order Now</button>
            </form>

            <!-- Back to List Button -->
            <a href="{{ route('sepatu.home') }}" class="btn">Kembali ke Daftar Sepatu</a>
        </div>
    </div>

    <!-- JavaScript -->
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

        function validateForm() {

            const selectedSize = document.querySelector('input[name="size"]:checked');
            const orderButton = document.getElementById('orderButton');

            orderButton.disabled = !(selectedSize);
        }


        document.querySelectorAll('input[name="size"]').forEach((radio) => {
            radio.addEventListener('change', function () {
                document.getElementById('form_size').value = this.value;
                validateForm();
            });
        });

        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('orderButton').disabled = true;
        });
    </script>
</body>
</html>
@endsection
