@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Sepatu</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Detail Sepatu
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <tbody>
            <tr>
              <th scope="row">Nama</th>
              <td>{{ $sepatus->nama }}</td>
            </tr>
            <tr>
              <th scope="row">Harga</th>
              <td>{{ $sepatus->harga }}</td>
            </tr>
            <tr>
              <th scope="row">Kategori</th>
              <td>{{ $sepatus->kategori->nama }}</td>
            </tr>

            <tr>
              <th scope="row">Merek</th>
              <td>{{ $sepatus->merek->nama_merek }}</td>
            </tr>
            <tr>
              <th scope="row">Gambar</th>
              <td><img src="{{ $sepatu->gambar_sepatu->gambar_sepatu ?? asset('images/default-image.jpg') }}"
                alt="Gambar Sepatu" width="100"></td>
            </tr>

          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <a href="/dashboard-sepatu" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
