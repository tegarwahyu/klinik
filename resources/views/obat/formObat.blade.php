@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Input Obat</h1>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form id="form-inputObat" method="POST" action="{{route('post.input.obat')}}">
                    @csrf

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_obat">
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" name="jumlah_obat"> 
                                <p>Pcs (Pieces)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" name="harga_obat"> 
                                <p>Rp (Rupiah)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Daftar</button>
                                <a class="btn btn-danger" onclick="clearFormObat()">Reset Form</a>
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
    function clearFormObat() {
        $('#form-inputObat')[0].reset();
    }
</script>
@endsection
