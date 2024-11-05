@extends('layouts.main')

@section('content')
    <h1>Riwayat Pemesanan</h1>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Sepatu</th>
                <th>Harga</th>
                <th>Warna</th>
                <th>Ukuran</th>
                <th>Jumlah</th>
                <th>Total</th>

                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($histories as $history)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $history->sepatu->nama }}</td>
                    <td>{{ number_format($history->harga, 0, ',', '.') }}</td>
                    <td>{{ $history->color->color }}</td>
                    <td>{{ $history->size->size }}</td>
                    <td>{{ $history->jumlah }}</td>
                    <td>{{ number_format($history->total, 0, ',', '.') }}</td>
                    <td>
                        <span class="badge {{ $history->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                            {{ $history->status == 'pending' ? 'Pesanan Sedang Dibuat' : 'Pesanan Sukses' }}
                        </span>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $histories->links() }}
@endsection
