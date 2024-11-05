@extends('dashboard.layouts.main')
@section('content')

<h1>Order</h1>

<table class="table table-bordered table-striped table-hover text-center">
    <thead class="table-dark">
        <tr>
            <th>No</th>
            <th>Sepatu</th>
            <th>Harga</th>
            <th>Warna</th>
            <th>Ukuran</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th>Bukti</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $orders->firstItem() + $loop->index }}</td>
            <td>{{ $order->sepatu->nama }}</td>
            <td>Rp {{ number_format($order->harga, 0, ',', '.') }}</td>
            <td>{{ $order->color->color }}</td>
            <td>{{ $order->size->size }}</td>
            <td>{{ $order->jumlah }}</td>
            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
            <td>
                @if($order->bukti)
                    <a href="{{ asset('storage/' . $order->bukti) }}" target="_blank">
                        <img src="{{ asset('storage/' . $order->bukti) }}" alt="Bukti Pembayaran" style="width: 60px; height: auto; cursor: pointer;">
                    </a>
                @else
                    <span class="text-muted">Tidak ada bukti</span>
                @endif
            </td>
            <td>
                <span class="badge {{ $order->status == 'pending' ? 'bg-warning' : 'bg-success' }}">
                    {{ $order->status == 'pending' ? 'Pesanan Sedang Dibuat' : 'Pesanan Sukses' }}
                </span>
            </td>
            <td>
                <form action="{{ route('orders.confirm', $order->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('PUT')
                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Konfirmasi pesanan ini?')">Konfirmasi</button>
                </form>

                <form action="/dashboard-order/{{ $order->id }}" method="POST" class="d-inline">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-3">
    {{ $orders->links() }}
</div>

<!-- Modal styling for enlarged image -->
<style>
    .modal-body img {
        max-width: 100%;
        height: auto;
        display: block;
        margin: 0 auto;
    }
</style>

<!-- Script for Bootstrap modal initialization -->
<script>
    $(document).ready(function() {
        $('.modal').on('shown.bs.modal', function () {
            console.log('Modal dibuka');
        });

        $('.modal').on('hidden.bs.modal', function () {
            console.log('Modal ditutup');
        });
    });
</script>

@endsection
