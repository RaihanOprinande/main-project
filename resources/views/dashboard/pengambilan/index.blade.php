@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar Ukuran</h1>

@if (session('pesan'))
<div class="alert alert-warning alert-dismissible fade show" role="alert">
 {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<a href="/dashboard/pengambilan/create" class="btn btn-primary mb-2">Tambah metode pengambilan</a>

{{-- <div class="row mb-3 mt-4">
    <div class="col-md-4">
        <form class="d-flex" role="search" action="{{ url('/dshbrd-spt') }}" method="GET">
            <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-primary" type="submit">Search</button>
        </form>
    </div>
</div> --}}
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Tipe Pengambilan</th>
        <th>Ongkir</th>
        <th>aksi</th>
    </tr>
    @foreach ($pengambilans as $pengambilan)
    <tr>
        <td>{{ $pengambilans->firstItem() + $loop->index }}</td>
        <td>{{ $pengambilan->metode }}</td>
        <td>{{ $pengambilan->ongkir }}</td>

        <td class="text-nowrap">
            <a href="/dashboard/pengambilan/{{ $pengambilan->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            <form action="/dashboard/pengambilan/{{ $pengambilan->id }}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin akan menghapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $pengambilans->links() }}
@endsection
