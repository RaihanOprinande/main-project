@extends('layouts.main')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Step-off - Movie Synopsis</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .header-image {
            width: 100%;
            height: 600px;
            background-color: #3a5a40;
            background-image: url('{{ asset('images/logo1.jpeg.jpg') }}');
            background-size: cover; /* Mengubah dari 'cover' menjadi 'contain' */
            background-repeat: no-repeat;
            background-position: center;
        }

        .synopsis {
            background-color: white;
            padding: 100px;
            margin: 20px auto;
            max-width: 1200px;

        }

        .synopsis-content {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .synopsis-text {
            flex: 2;
            min-width: 300px;
        }

        .synopsis-image {
            flex: 1;
            height: 200px;
            background-color: #ddd;
            background-image: url('{{ asset('images/logo1.jpeg.jpg') }}');
            background-size: cover;
            background-position: center;
            min-width: 200px;
        }

        /* Menambahkan jarak di bawah judul */
        .text-center {
            text-align: center;
            margin-bottom: 30px; /* Tambahkan margin bawah untuk memberikan jarak */
        }

        .movie-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .character-images {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin: 20px auto;
            max-width: 1200px;
            flex-wrap: wrap;
        }

        .character-image {
            width: 30%;
            height: 350px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
            min-width: 150px;
        }

        /* Responsive design */
        @media (max-width: 768px) {
            .synopsis-content {
                flex-direction: column;
            }

            .character-images {
                flex-direction: column;
            }

            .character-image {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>
<body>
    <header class="header-image"></header>

    <main>
        <section class="synopsis">
            <h2 class="text-center">Step-off</h2>
            <div class="synopsis-content">
                <article class="synopsis-text">
                    <p>Sepatu adalah alas kaki yang dirancang untuk melindungi dan memberikan kenyamanan pada kaki saat melakukan berbagai aktivitas. Selain sebagai pelindung, sepatu juga berfungsi sebagai elemen fashion yang memperkaya penampilan. Sepatu telah menjadi bagian dari budaya manusia selama ribuan tahun, dengan berbagai desain dan bahan yang bervariasi sesuai dengan kebutuhan dan kondisi lingkungan.</p>
                </article>
                <figure class="synopsis-image"></figure>
            </div>
        </section>

        <section class="movie-info">
            <p>Aired: May 31, 2013</p>
            <p>Genres: Drama, Romance, Slice of Life</p>
            <p>Duration: 46 min</p>
            <p>Rating: PG-13</p>
        </section>

        <section class="character-images">
            <figure class="character-image" style="background-image: url('{{ asset('images/sepatu1.jpeg') }}');"></figure>
            <figure class="character-image" style="background-image: url('{{ asset('images/sepatu2.jpeg') }}');"></figure>
            <figure class="character-image" style="background-image: url('{{ asset('images/sepatu3.jpeg') }}');"></figure>
        </section>
    </main>
</body>
</html>

@endsection
