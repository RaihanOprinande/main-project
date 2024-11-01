@extends('dashboard.layouts.main')

@section('content')
<h1>Daftar Warna</h1>

@if (session('pesan'))
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Pesan: </strong> {{ session('pesan') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<a href="/dashboard-color/create" class="btn btn-primary mb-2">Tambah Warna</a>

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Nama Warna</th>
        <th>Aksi</th>
    </tr>
    @foreach ($colors as $color)
    <tr>
        <td>{{ $colors->firstItem() + $loop->index }}</td>
        <td>{{ $color->color }}</td>
        <td class="text-nowrap">
            <a href="/dashboard-color/{{ $color->id }}/edit" class="btn btn-warning btn-sm">Edit</a>
            <form action="/dashboard-color/{{ $color->id }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus warna ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{ $colors->links() }}
@endsection
