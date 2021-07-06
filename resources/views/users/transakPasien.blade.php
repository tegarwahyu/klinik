@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Tindak Pasien</h1>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form id="form-tindakPasien" method="POST" action="{{route('post.tindak.pasien')}}">
                    @csrf

                    <input type="hidden" name="transaksi_id" value="{{$data[0]->id}}">
                    <input type="hidden" name="user_id" value="{{$data[0]->data_user[0]->id}}">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasien</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_pasien" value="{{$data[0]->data_user[0]->name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Obat Pasien</label>
                            <div class="col-sm-12 col-md-7">
                                <select id="obat-id" name="obat" class="form-control">
                                  <option value=""> -- Pilih --</option>
                                    @foreach ($obat as $obats)
                                        <option value="{{ $obats->id }}">{{ $obats->nama_obat }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="hidden" name="id_obat" value="{{$data[0]->data_obat[0]->id}}">
                                <input type="number" class="form-control" id="id_jumlahObat" name="jumlah_obat_yg_dibayar"> 
                                <P>jika ingin mengeluarkan total tolong di klik panah pada pojok input field</P>
                                <p>Pcs (Pieces)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" id="id_hargaObat" name="harga_obat" value="{{$data[0]->data_obat[0]->harga}}" disabled> 
                                <p>Rp (Rupiah)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah yang Harus Dibayar</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" id="id_total" name="total_harga" disabled> 
                                <p>Rp (Rupiah)</p>
                            </div>
                        </div>
                        

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Tindak</button>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(document).on("change", "#id_jumlahObat", function() {
      var a=parseInt($("#id_jumlahObat").val());
      var b=parseInt($("#id_hargaObat").val());
      var sum=a*b;
      $("#id_total").val(sum);
    });
    function clearForm() {
        $('#form-tindakPasien')[0].reset();
    }
</script>

@endsection
