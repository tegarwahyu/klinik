@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Pendaftaran Pasien</h1>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form id="form-daftarPasien" method="POST" action="{{route('pendaftaran.pasien')}}">
                    @csrf

                    <input type="hidden" name="user_id" value="{{$data->id}}">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasien</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="username" value="{{$data->name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Keluhan</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea name="keluhan" id="" cols="50" rows="10"></textarea>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Umur</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" name="umur">
                                <p>Thn (Tahun)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tinggi Badan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" name="tinggi_badan">
                                <p>Cm (Centimeter)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Berat Badan</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" name="berat_badan"> 
                                <p>Kg (Kilogram)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Daftar</button>
                                <a class="btn btn-danger" onclick="clearForm()">Reset Form</a>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
        </section>
      </div>
<script>
    function clearForm() {
        $('#form-inputPasien')[0].reset();
    }
</script>
@endsection
