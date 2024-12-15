<!DOCTYPE html>
<html>
<head>
    <title>Generate PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 5px;
        }
        h1 {
            text-align: center;
            font-size: 1.2em;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.8em;
        }
        th, td {
            border: 1px solid #000;
            padding: 4px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .no {
            width: 5%;
        }
        .harga, .kategori, .merek {
            width: 12%;
        }
        .size, .jumlah, .total {
            width: 10%;
        }
    </style>
</head>
<body>

<h1>Daftar Keuangan Pemasukan</h1>

<table>
    <tr>
        <th class="no">No</th>
        <th class="nama">Nama</th>
        <th class="harga">Harga</th>
        <th class="kategori">Kategori</th>
        <th class="merek">Merek</th>
        <th class="size">Size</th>
        <th class="jumlah">Jumlah</th>
        <th class="total">Total</th>
    </tr>
    @foreach ($pemasukans as $pemasukan)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pemasukan->nama }}</td>
        <td>{{ $pemasukan->harga }}</td>
        <td>{{ $pemasukan->kategori->nama }}</td>
        <td>{{ $pemasukan->merek->nama_brand }}</td>
        <td>{{ $pemasukan->size->size }}</td>
        <td>{{ $pemasukan->jumlah }}</td>
        <td>{{ $pemasukan->total }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
