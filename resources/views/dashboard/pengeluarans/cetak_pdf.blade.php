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
        .nim, .prodi, .email {
            width: 12%;
        }
        .nama, .tempat-lahir, .tgl-lahir, .alamat {
            width: 10%;
        }
    </style>
</head>
<body>

<h1>Daftar Keuangan Pengeluaran</h1>

<table>
    <tr>
        <th class="no">No</th>
        <th class="nim">Kategori</th>
        <th class="nama">Keterangan</th>
        <th class="tempat-lahir">Tanggal</th>
        <th class="tgl-lahir">Harga</th>
    </tr>
    @foreach ($pengeluarans as $pengeluaran)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pengeluaran->kategori->nama }}</td>
        <td>{{ $pengeluaran->keterangan }}</td>
        <td>{{ $pengeluaran->date }}</td>
        <td>{{ $pengeluaran->uang }}</td>
    </tr>
    @endforeach
</table>

</body>
</html>
