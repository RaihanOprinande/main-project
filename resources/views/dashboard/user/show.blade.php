@extends('dashboard.layouts.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail User</h1>
</div>
<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        Detail User
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <tbody>

            <tr>
              <th scope="row">Nama</th>
              <td>{{ $user->name }}</td>

            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>{{ $user->email }}</td>

              </tr>

          </tbody>
        </table>
      </div>
      <div class="card-footer">
        <a href="/dshbrd-usr" class="btn btn-secondary">Kembali</a>
      </div>
    </div>
  </div>
</div>
@endsection
