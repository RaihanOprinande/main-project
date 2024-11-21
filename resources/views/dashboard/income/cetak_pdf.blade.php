<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Data Pemasukan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
        .footer {
            font-weight: bold;
            text-align: right;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Laporan Data Pemasukan</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Sepatu</th>
                <th>Harga</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($incomes as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->sepatu->nama }}</td>
                <td>Rp {{ number_format($data->harga, 0, ',', '.') }}</td>
                <td>{{ $data->color->color }}</td>
                <td>{{ $data->size->size }}</td>
                <td>{{ $data->jumlah }}</td>
                <td>Rp {{ number_format($data->total, 0, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="6" class="footer">Total Pemasukan:</td>
                <td class="footer">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>
</body>
</html>
