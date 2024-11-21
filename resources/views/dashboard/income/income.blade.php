@extends('dashboard.layouts.main')

@section('content')
    <h1 class="mb-4">Data Pemasukan</h1>
    <a href="{{ route('dashboard.income.cetakPdf') }}" class="btn btn-success mb-3">Cetak PDF</a>



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
            <tr class="table-secondary">
                <td colspan="6" class="text-start fw-bold">Total Pemasukan:</td>
                <td class="fw-bold">Rp {{ number_format($totalPemasukan, 0, ',', '.') }}</td>
            </tr>
        </tfoot>
    </table>

    <div class="d-flex justify-content-center mt-3">
        {{ $incomes->links() }} <!-- Pagination jika data banyak -->
    </div>
@endsection
