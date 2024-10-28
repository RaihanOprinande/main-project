@extends('dashboard.layouts.main')
@section('content')

<h1>Daftar Merek</h1>

  @if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Hei Tayo dia bis kecil ramah</strong> {{session('pesan')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
<a href="/dashboard-brand/create" class="btn btn-primary mb-2">Tambah Brand</a>

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
        <th>Nama_Merek</th>
        <th>Gambar</th>
        <th>Aksi</th>
    </tr>
    @foreach ($brands as $brand)
    <tr>
        <td>{{ $brands->firstItem()+$loop->index }}</td>
        <td>{{ $brand->nama_merek }}</td>
        <td>{{ $brand->gambar }}</td>

        <td class="text-nowrap">
            <a href="/dashboard-brand/{{$brand->id}}" class="btn btn-success btn-sm" title="lihat detail">Detail</a>
            <a href="/dashboard-brand/{{$brand->id}}/edit" class="btn btn-warning">Edit</a>
            <form action="/dashboard-brand/{{$brand->id}}" method="post" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('yakin akan menghapus data ini?')">hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $brands->links() }}
@endsection



