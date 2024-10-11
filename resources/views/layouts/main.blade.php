<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>STEP-OFF</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        /* Menambahkan gaya untuk kontainer */
        .container-custom {
            width: 100%; /* Mengubah lebar kontainer menjadi 90% dari lebar layar */
            max-width: 1200px; /* Mengatur lebar maksimum kontainer */
            margin: 0 auto; /* Menjajarkan kontainer ke tengah */
            padding: 20px; /* Menambahkan padding untuk ruang lebih */
        }
    </style>
</head>

<body class="d-flex flex-column h-100">

    @include('layouts.header')

    {{--

    @include('dashboard.layouts.sidebar') --}}

    <!-- Begin page content -->
    <main class="flex-shrink-0 content">
        <div class="container-custom"> <!-- Menambahkan kontainer khusus -->
            @yield('content')
        </div>
    </main>

    @include('layouts.footer')

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
