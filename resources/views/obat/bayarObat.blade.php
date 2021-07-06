@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Form Bayar Obat</h1>
          </div>
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-body">
                    <form id="form-BayartObat" method="POST" action="{{route('post.pembayaran.obat')}}" enctype="multipart/form-data">
                    @csrf

                        <input type="hidden" name="id_transaksi" value="{{$data_pasien[0]->id}}">
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pasien</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="nama_obat" value="{{$data_pasien[0]->data_user[0]->name}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="hidden" name="id_obat" value="{{$data_pasien[0]->data_obat[0]->id}}">
                                <input type="text" class="form-control" value="{{$data_pasien[0]->data_obat[0]->nama_obat}}" disabled>
                            </div>
                        </div>

                        <!-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" id="id_jumlahObat" name="jumlah_obat_yg_dibayar"> 
                                <P>jika ingin mengeluarkan total tolong di klik panah pada pojok input field</P>
                                <p>Pcs (Pieces)</p>
                            </div>
                        </div> -->

                        <!-- <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga obat</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="number" class="form-control" id="id_hargaObat" name="harga_obat" value="{{$data_pasien[0]->data_obat[0]->harga}}" disabled> 
                                <p>Rp (Rupiah)</p>
                            </div>
                        </div> -->

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Jumlah yang Harus Dibayar</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="total" value="{{$data_pasien[0]->jumlah_yang_dibayar}}" disabled> 
                                <p>Rp (Rupiah)</p>
                            </div>
                        </div>

                        <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Upload Bukti Pembayaran</label>
                          <div class="col-sm-12 col-md-6">
                            <!-- <input type="file" name="bukti_pembayaran" multiple class="form-control" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label> -->
                            <div class="file-upload-wrapper">
                                <input type="file"name="bukti_pembayaran[]" class="file-upload" />
                            </div>
                          </div>
                        </div>

                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-success">Bayar</button>
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

// $(document).on("change", "#id_jumlahObat", function() {
//     var a=parseInt($("#id_jumlahObat").val());
//     var b=parseInt($("#id_hargaObat").val());
//     var sum=a*b;
//     $("#id_total").val(sum);
//     });


    function clearFormObat() {
        $('#form-BayartObat')[0].reset();
    }
</script>
@endsection
