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
                    <a href="{{route('form.user.pasien')}}" class="btn btn-primary" style="margin-right: 25px;">Daftar Pasien</a>
                  </div>
                  
                  <div class="card-body">
                    <!-- <div class="section-title mt-0">Light</div> -->
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">Nama Pasien</th>
                          <th scope="col">keluhan</th>
                          <th scope="col">Status</th>
                          <th scope="col">Obat</th>
                          <th scope="col">Bukti Pembayaran</th>
                          <th scope="col">Aksi</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data as $user)
                          <tr>
                              <td>{{$user->id}}</td>
                              <td>{{$user->name}}</td>
                              <td>{{$user->keluhan}}</td>
                              <td>{{ ($user->status == null) ? 'Belum ada tindakan' : 'Telah Selesai' }}</td>
                              <td>{{ ($user->status == null) ? 'Belum diberikan Obat' : (($user->bukti != null) ? 'Telah Melakukan Pembayaran' : 'Mohon membayar Obat') }}</td>
                              @if($user->bukti != null)
                              <td><a class="btn btn-success" href="#" onclick="window.open('{{$user->bukti}}')">Lihat Bukti</a></td>
                              @else
                              <td>Pesien Belum Melakukan Pembayaran</td>
                              @endif
                              @if(($user->status == null && $user->obat_id == null ))
                              <td><a class="btn btn-warning" href="{{ route('tindak.pasien',$user->kode_transaksi) }}">Tindak</a></td>
                              @endif
                              @if(($user->status != null && $user->bukti == null && auth()->user()->name != $user->name))
                              <td><a class="btn btn-danger" href="{{ route('bayar.obat',$user->kode_transaksi) }}">Bayar</a></td>    
                              @endif
                              @if(($user->bukti != null))
                              <td><a class="btn btn-success disabled" href="#">Sudah Membayar</a></td>
                              @endif
                              
                          </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
        </section>
</div>

@endsection
