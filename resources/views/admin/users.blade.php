@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tabel Pasien</h1>
          </div>
          <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="text-right">
                    <a href="{{route('form.user')}}" class="btn btn-primary" style="margin-right: 25px;">Tambah User</a>
                  </div>
                  
                  <div class="card-body">
                    <!-- <div class="section-title mt-0">Light</div> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama</th>
                          <th scope="col">Email</th>
                          <th scope="col">Admin</th>
                          <th scope="col">User</th>
                          <th scope="col">Pegawai</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($user as $data_users)
                          <tr>
                              <td>{{$data_users->id}}</td>
                              <td>{{$data_users->name}}</td>
                              <td>{{$data_users->email}}</td>
                              <td>{{ ($data_users->is_admin == 1) ? 'admin' : '' }}</td>
                              <td>{{ ($data_users->is_user == 1) ? 'user' : '' }}</td>
                              <td>{{ ($data_users->is_pegawai == 1) ? 'pegawai' : '' }}</td>
                              <td><a class="btn btn-danger" href="{{ route('delete.user',$data_users->id) }}">Delete</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
        </section>
</div>
  

@endsection
