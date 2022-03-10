@extends('layouts.top')
@section('content')
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dahboard AAK</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="modal fade" id="layanan">
<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Seluruh Layanan</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      <th>Jurusan</th>
                      <th>Jenis Layanan</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach($laya as $la)
                    <td>{{ $la->nim }}</td>
		              	<td>{{ $la->nama_mhs }}</td>
		              	<td>{{ $la->jurusan }}</td>
		              	<td>{{ $la->jenis }}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 text-dark">Dashboard</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/aak')}}">AAK</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    @foreach($set as $s)
            <?php
             $datedis = date("Y-m-d",strtotime("-$s->dispensasi weekday"));
             $datebst = date("Y-m-d",strtotime("-$s->bst weekday"));
             $datecuti = date("Y-m-d",strtotime("-$s->cuti weekday"));
            ?>
              @if(is_numeric($s->yudisium))
              <?php
              $number = $s->yudisium/100*$sts;
              $num=ceil($number)
              ?>
              @endif
              @endforeach
              @foreach($disindi as $d)
              <?php
              $dip= $d->created_at;
              ?>
              @endforeach
              @foreach($cutindi as $c)
              <?php
              $cis= $c->created_at;
              ?>
              @endforeach
              @foreach($bstindi as $bss)
              <?php
              $bt= $bss->created_at;
              ?>
              @endforeach
            
    <!-- Main content -->
    <div class="content">
      <div class="container">
<h4>Indikator Proses Layanan </h4>
          Batas Proses : Dispensasi  {{$s->dispensasi}} hari,Cuti {{$s->cuti}} hari, BST {{$s->bst}} hari
       <br>Yudisium {{$s->yudisium}}% dari banyak mahasiswa selesai TA   
      <br>Keterangan: 1.Kurang 2.Cukup 3.Baik
            <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
              @if($disindi->count()>0)
            <div class="small-box">
              <div class="inner">
              @if($datedis>$dip)
              <h3 style="color:#CD113B">1</h3>
              @endif
              @if($datedis==$dip)
              <h3 style="color:#FF7600">2</h3>
              @endif
              @if($datedis<$dip)
             <h3 style="color:#6384FF">3</h3>
              @endif
             
                <p>Dispensasi</p>
              </div>
               <div class="icon">
              @if($datedis>$dip)
              <i  style="color:#CD113B" class="far fa-frown"></i>
              @endif
              @if($datedis==$dip)
              <i style="color:#FF7600" class="far fa-meh"></i>
              @endif
              @if($datedis<$dip)
              <i style="color:#6384FF" class="far fa-smile"></i>
              @endif
              @else
              <div class="small-box">
              <div class="inner">
              <h3 style="color:#6384FF">3</h3>
              <p>Dispensasi</p>
              </div>
              <div class="icon">
              <i style="color:#6384FF" class="far fa-smile"></i>
              @endif
              
              </div>
              <a href="{{url('/dashdispen')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
              @if($ydm<$num)
             <h3 style="color:#CD113B">1</h3>
              @endif
              @if($ydm==$num)
             <h3 style="color:#FF7600">2</h3>
              @endif
              @if($ydm>$num)
              <h3 style="color:#6384FF">3</h3>
              @endif
                <p>Yudisium</p>
              </div>
              <div class="icon">
              @if($ydm<$num)
              <i  style="color:#CD113B" class="far fa-frown"></i>
                @endif
                @if($ydm==$num)
                <i style="color:#FF7600" class="far fa-meh"></i>
                @endif
                @if($ydm>$num)
                <i style="color:#6384FF" class="far fa-smile"></i>
                @endif
              </div>
              <a href="{{url('/dashyudi')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box">
              <div class="inner">
             
              @if($cutindi->count()>0)
              @if($datecuti>$cis)
              <h3 style="color:#CD113B">1</h3>
              @endif
              @if($datecuti==$cis)
              <h3 style="color:#FF7600">2</h3>
              @endif
              @if($datecuti<$cis)
             <h3 style="color:#6384FF">3</h3>
              @endif
                <p>Cuti</p>
              </div>
              <div class="icon">
              @if($datecuti>$cis)
              <i  style="color:#CD113B" class="far fa-frown"></i>
              @endif
              @if($datecuti==$cis)
              <i style="color:#FF7600" class="far fa-meh"></i>
              @endif
              @if($datecuti<$cis)
              <i style="color:#6384FF" class="far fa-smile"></i>
              @endif
              @else
              <div class="inner">
              <h3 style="color:#6384FF">3</h3>
              <p>Cuti</p>
              </div>
              <div class="icon">
              <i style="color:#6384FF" class="far fa-smile"></i>
              </div>
              @endif
              </div>
              <a href="{{url('/dashcuti')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box ">
              <div class="inner">
              @if($bstindi->count()>0)
              @if($datebst>$bt)
              <h3 style="color:#CD113B">1</h3>
              @endif
              @if($datebst==$bt)
              <h3 style="color:#FF7600">2</h3>
              @endif
              @if($datebst<$bt)
             <h3 style="color:#6384FF">3</h3>
              @endif
                <p>BST</p>
              </div>
              <div class="icon">
              @if($datebst>$bt)
              <i  style="color:#CD113B" class="far fa-frown"></i>
              @endif
              @if($datebst==$bt)
              <i style="color:#FF7600" class="far fa-meh"></i>
              @endif
              @if($datebst<$bt)
              <i style="color:#6384FF" class="far fa-smile"></i>
              @endif
              @else
              <div class="inner">
              <h3 style="color:#6384FF">3</h3>
              <p>BST</p>
              </div>
              <div class="icon">
              <i style="color:#6384FF" class="far fa-smile"></i>
              </div>
              @endif
              </div>

              <a href="{{url('/dashbst')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Jumlah Layanan yang telah selesai</h3>
                  <div class="card-tools">
                <a  id="layanan" name="layanan" data-toggle="modal" data-target="#layanan"  
                class="btn" style="text-decoration: underline; background-color: transparent;">Detail</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  </div>
              </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">{{$jumlahsemester}}</span>
                    <span>Jumlah Layanan Setiap Bulan</span>
                  
                  </p>
                </div>
              <div class="position-relative mb-4">
                  <canvas id="visitors-chart" height="200"></canvas>
                </div>
                <div class="d-flex flex-row justify-content-end">
                  
                  <span class="mr-2">
                  <i class="fas fa-square text-primary"></i> Semester Genap {{$gnp}}2 
                  </span>
                  <span>
                  <i class="fas fa-square text-gray"></i> Semester Ganjil {{$gjl}}1
                  </span>
                  <span class="mr-1">
               
                  </span>   
                </div>
                
              </div>
            </div>
            <!-- /.card -->
          
            
            <!-- /.card -->
          </div>
          <div class="col-lg-6">
          <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title">Layanan Perlu Diproses</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  </div>
              </div>
              <div class="card-body table-responsive p-0">
                <table class="table table-striped table-valign-middle">
                  <thead>
                  <tr>
                    <th>Layanan</th>
                    <th>Jumlah</th>
                    <th>detail</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>
                    Dispensasi
                    </td>
                    <td>{{$dis}}</td>

                    <td>
                      <a href="{{url('/detdispen')}}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Yudisium
                    </td>
                    <td>{{$yudi}}</td>
                    
                    <td>
                      <a href="{{url('/detyudi')}}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Cuti/BSS
                    </td>
                    <td>{{$cuti}}</td>
                    <td>
                      <a href="{{url('/detcuti')}}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>
                    BST
                    </td>
                    <td>{{$bst}}</td>
                    <td>
                      <a href="{{url('/detbst')}}" class="text-muted">
                        <i class="fas fa-search"></i>
                      </a>
                    </td>
                  </tr>
                  </tbody>
                </table>
              </div>
           </div>
           <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Perbandingan layanan</h3>
                  <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>  
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                  </div>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Perbandingan jumlah layanan</span>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Tahun ini
                  </span>

                  <span>
                    <i class="fas fa-square text-gray"></i> Tahun lalu
                  </span>
                </div>
              </div>
            </div>
           </div>
           
          <!-- /.col-md-6 -->
        </div>
        
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>

<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<script src="{{asset('dist/js/demo.js')}}"></script>
<script>
$(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ['2020-2021'],
      datasets: [
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : [{{$jumlahthnini}}]
        },
        {
          backgroundColor: '#ced4da',
          borderColor    : '#ced4da',
          data           : [{{$jumlahthnlalu}}]
        }
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                
              }
              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
  var bln = <?php echo json_encode($month) ?>;

  var $visitorsChart = $('#visitors-chart')
  var visitorsChart  = new Chart($visitorsChart, {
    data   : {
      labels  : bln,
      datasets: [{
        type                : 'line',
        data                : {{$hslgenap}},
        backgroundColor     : 'transparent',
        borderColor         : '#007bff',
        pointBorderColor    : '#007bff',
        pointBackgroundColor: '#007bff',
        fill                : false
        // pointHoverBackgroundColor: '#007bff',
        // pointHoverBorderColor    : '#007bff'
      
    },
    {
          type                : 'line',
          data                : {{$hslganjil}},
          backgroundColor     : 'tansparent',
          borderColor         : '#ced4da',
          pointBorderColor    : '#ced4da',
          pointBackgroundColor: '#ced4da',
          fill                : false
          // pointHoverBackgroundColor: '#ced4da',
          // pointHoverBorderColor    : '#ced4da'
       
    }],
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero : true,
            suggestedMax: 10
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })
})

</script>
</body>
</html>
@endsection