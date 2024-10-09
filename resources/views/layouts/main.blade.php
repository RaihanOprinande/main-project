<!doctype html>
<html lang="en" class="h-100" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Akademik PNP</title>

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>

<body class="d-flex flex-column h-100">

    @include('layouts.header')

    {{--

    @include('dashboard.layouts.sidebar') --}}

    <!-- Begin page content -->
    <main class="flex-shrink-0 content">
        <div class="container">
                @yield('content')
            </div>
    </main>

    @include('layouts.footer')

    <script src="js/bootstrap.bundle.min.js"></script>

</body>

</html>
