@extends('dashboard.layouts.main')
@section('content')
<h1>Daftar Stocks</h1>

@if (session('pesan'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
   {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="/dashboard-stock/create" class="btn btn-primary mb-2">Add Stock</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Kode Sepatu</th>
        <th>Sepatu</th>
        <th>Size</th>
        <th>Quantity</th>
        <th>Aksi</th>
    </tr>
    @foreach ($sepatusizes as $sepatu)
        @foreach ($sepatu->sizes as $size )
            <tr>
                <td>{{ $sepatusizes->firstItem() + $loop->index }}</td>
                <td>{{ $sepatu->kode_sepatu }}</td>
                <td>{{ $sepatu->nama }}</td>
                <td>{{ $size->size }}</td>
                <td>{{ $size->pivot->quantity }}</td>   
                <td class="text-nowrap">
                    <a href="/dashboard-stock/{{ $sepatu->id }}/edit" class="btn btn-warning btn-sm" title="Edit"><i class="bi bi-pencil-square"></i></a>

                    {{-- <form action="/dashboard-stock/{{ $sepatusizes->id }}" method="post" class="d-inline">
                        @method('DELETE')
                        @csrf
                        <button title="Delete" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda ingin menghapus pemasukan ini?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form> --}}
                </td>
            </tr>
        @endforeach
    @endforeach
</table>
{{ $sepatusizes->links() }}
@endsection
