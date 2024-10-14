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
            padding: 0px;
        }

        .nav-link {
  position: relative;
  text-decoration: none;
  color: inherit;
  transition: all 0.3s ease-in-out;
}

.nav-link::after {
  content: "";
  position: absolute;
  left: 50%; /* Awal dari tengah */
  bottom: 0;
  width: 0;
  height: 2px;
  background-color: black;
  transition: width 0.3s; /* Animasikan 'left' juga */
  transform: translateX(-50%); /* Agar posisi awal benar-benar di tengah */
}

.nav-link:hover::after {
  width: 100%; /* Melebar ke seluruh lebar link */
  left: 0; /* Geser kiri saat animasi berlangsung */
  transform: translateX(0); /* Reset transformasi saat hover */
}

.btn {
            display: inline-block;
            padding: 12px 30px;
            background-color: #000;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
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
