@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Tabel Users</h1>
          </div>
          <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="text-right">
                    <a href="{{route('form.obat')}}" class="btn btn-primary" style="margin-right: 25px;">Input Obat</a>
                  </div>
                  
                  <div class="card-body">
                    <!-- <div class="section-title mt-0">Light</div> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Obat</th>
                          <th scope="col">Jumlah Obat</th>
                          <th scope="col">Harga Obat Per (Pcs)</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data_obat as $obat)
                          <tr>
                          <td>{{$obat->id}}</td>
                              <td>{{$obat->nama_obat}}</td>
                              <td>{{$obat->jumlah}}</td>
                              <td>{{$obat->harga}}</td>
                              <td><a class="btn btn-danger" href="{{ route('delete.obat',$obat->id)}}">Delete</a></td>
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
        </section>
</div>

@endsection
