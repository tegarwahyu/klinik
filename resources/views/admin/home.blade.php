@extends('layouts.app')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-body pt-2 pb-2">
                
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row">
                                <div class="container-fluid d-flex justify-content-center">
                                    <div class="col-sm-8 col-md-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body" style="height: 420px">
                                                <div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
                                                    <div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
                                                    </div>
                                                    <div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
                                                        <div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
                                                    </div>
                                                </div> <canvas id="chart-line" width="299" height="200" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
              </div>
            </div>
          </div>
        </section>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
      </div>
<script>
$(document).ready(function() {

      $.ajax({
            url:"{{url('admin/getDataChart')}}",
            type: "GET",
            dataType: "JSON",
            success: function(data){
              console.log(data)
              // foreach
              let sudah_mendaftar = data.transaksi.length;
              let Pasien_sudah_selesai = data.done.length;
              let Pasien_belum_membayar = data.undone.length;
                var ctx = $("#chart-line");
                var myLineChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ["Pasien Belum Membayar", "Pasien Sudah Mendaftar", "Pasien Sudah Selesai"],
                        datasets: [{
                            data: [Pasien_belum_membayar, sudah_mendaftar, Pasien_sudah_selesai],
                            backgroundColor: ["rgba(255, 0, 0, 0.5)", "rgba(100, 255, 0, 0.5)", "rgba(200, 50, 255, 0.5)", "rgba(0, 100, 255, 0.5)"]
                        }]
                    },
                    options: {
                        title: {
                            display: true,
                            text: 'Data Pasien'
                        }
                    }
                });
            }
      });
        
    });
</script>
@endsection
