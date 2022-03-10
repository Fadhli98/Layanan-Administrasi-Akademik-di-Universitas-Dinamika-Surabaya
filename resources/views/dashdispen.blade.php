@extends('layouts.top')
@section('content')
<html lang="en">
<head>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Dahboard Dispensasi</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition layout-top-nav">
<div class="modal fade" id="dispen">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Detail Dispensasi</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
		
        <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                     
                      <th>Jurusan</th>
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Keluar</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach($dispmaha as $di)
                    <td>{{ $di->nim }}</td>
		              	<td>{{ $di->nama_mhs }}</td>
			             
		              	<td>{{ $di->jurusan }}</td>
                    <td>{{ $di->created_at }}</td>
                    <td>{{ $di->updated_at }}</td>
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

<div class="modal fade" id="Proses">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Layanan Dispensasi Proses</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
        <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                  <thead>
                    <tr>
                      <th>NIM</th>
                      <th>Nama</th>
                      
                      <th>Jurusan</th>
                      <th>Tanggal Masuk</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                    @foreach($dis as $diss)
                    <td>{{ $diss->nim }}</td>
		              	<td>{{ $diss->nama_mhs }}</td>
			            
		              	<td>{{ $diss->jurusan }}</td>
		              	<td>{{ $diss->created_at }}</td>
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
            <h1 class="m-0 text-dark">Dashboard Dispensasi</h1>
           
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <!-- AREA CHART -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Layanan Jumlah Dispensasi</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
                
              </div>
              <div class="card-body">
               <div>
               <canvas id="speedChart" width="600" height="450"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- DONUT CHART -->
            <div class="card card-danger">
              <div class="card-header">
                <h3 class="card-title">Jurusan</h3>
                <div class="card-tools">
                <a  id="dispen" name="dispen" data-toggle="modal" data-target="#dispen"  class="btn btn-danger" style="text-decoration: underline">Detail</a>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
              <h5>Jumlah setiap jurusan pada semester sekarang</h5>
              <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand">
              </div><div class="chartjs-size-monitor-shrink"><div class="">
              </div>
              </div></div><canvas id="oilChart" width="600" height="400"></canvas>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
          </div>
          <!-- /.col (LEFT) -->
          <div class="col-md-6">
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Indikator</h3>
                <div class="card-tools">
                <a  id="proses" name="proses" data-toggle="modal" data-target="#proses"  class="btn btn-warning" style="text-decoration: underline">Detail</a>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body" >
              @foreach($set as $s)
              <?php
              $datenow = date("Y-m-d",strtotime("-$s->dispensasi weekday"));
              ?>
             @endforeach
             @foreach($datedis as $d)
              <?php
              $dip= $d->created_at;
              ?>
              @endforeach
          
              @if($dis->count()>0)
              <h5>Jumlah layanan yang belum diproses, batas proses {{$s->dispensasi}} hari</h5>
              <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" >
              </div><div class="chartjs-size-monitor-shrink"><div class="">
              </div>
              </div></div> <center><div id="some_element"></div></center>
              @if($datenow>$dip)
              <center><h3 style="color:#CD113B">Kurang</h3></center>
              @endif
              @if($datenow==$dip)
              <center><h3 style="color:#FF7600">Cukup</h3></center>
              @endif
              @if($datenow<$dip) 
              <center><h3 style="color:#6384FF">Baik</h3></center>
              @endif
              @else
              <h5>Jumlah Permohonan Dispensasi Kosong</h5>
              <div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand">
              </div><div class="chartjs-size-monitor-shrink"><div class="">
              </div>
              </div></div> <center><div id="some_element" ></div></center>
              <center><h3 style="color:#6384FF">Baik</h3></center>
              @endif
              
              </div>
              </div>
          </div>
          <!-- /.col (RIGHT) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
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
<script src="{{asset('dist/js/pages/dashboard3.js')}}"></script>
<script src="{{asset('js/pureknob.js')}}"></script>
<script type="text/javascript">
		
    function demoKnob() {
      // Create knob element, 300 x 300 px in size.
      const knob = pureknob.createKnob(300, 300);

      // Set properties.
      knob.setProperty('angleStart', -0.75 * Math.PI);
      knob.setProperty('angleEnd', 0.75 * Math.PI);
      @if($dis->count()>0)
      @if($datenow>$dip)
      knob.setProperty('colorFG', '#CD113B');
      @endif
      @if($datenow==$dip) 
      knob.setProperty('colorFG', '#FF7600');
      @endif
      @if($datenow<$dip)
      knob.setProperty('colorFG', '#6384FF');
      @endif
      @else
      knob.setProperty('colorFG', '#6384FF');
      @endif
      
      knob.setProperty('trackWidth', 0.4);
      knob.setProperty('valMin', 0);
      knob.setProperty('valMax', 100);
      knob.setProperty('readonly', true);
      // Set initial value.
      

      knob.setValue({{$hit}});
     
      const listener = function(knob, value) {
        console.log(value);
      };

      knob.addListener(listener);

      // Create element node.
      const node = knob.node();

      // Add it to the DOM.
      const elem = document.getElementById('some_element');
      elem.appendChild(node);
    }
    function ready() {
      demoKnob();
    
    }

    document.addEventListener('DOMContentLoaded', ready, false);
  
  </script>

<script>
var speedCanvas = document.getElementById("speedChart");

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var bln = <?php echo json_encode($month) ?>;
var dataFirst = {
    label: "Jumlah Semester Ganjil {{$gjl}}1",
    data: {{$hslganjil}},
    fill: false,
  borderColor: '#ced4da'
  };

var dataSecond = {
    label: "Jumlah Semester Genap {{$gnp}}2",
    data: {{$hslgenap}},
    fill: false,
  borderColor: '#007bff'
  };
  var speedData = {
  labels:  bln,
  datasets: [dataSecond,dataFirst]
};
var chartOptions = {
  legend: {
    display: true,
    position: 'top',
    labels: {
      boxWidth: 80,
      fontColor: 'black'
    }
  }
};

var lineChart = new Chart(speedCanvas, {
  type: 'line',
  data: speedData,
  options: chartOptions
});
</script>
<script>
var oilCanvas = document.getElementById("oilChart");

var  diagram= <?php echo json_encode($dia) ?>;
var  isid= <?php echo json_encode($isi) ?>;

Chart.defaults.global.defaultFontFamily = "Lato";
Chart.defaults.global.defaultFontSize = 18;

var oilData = {
    labels: 
       diagram,
    datasets: [
        {
            data:isid,
            backgroundColor: [
                "#FF6384",
                "#63FF84",
                "#007bff",
                "#8463FF",
                "#6384FF",
                "#ffc107",
                "#ff851b"
            ],
            borderColor: "black",
            borderWidth: 2
        }]
};

var chartOptions = {
  rotation: -Math.PI,
  cutoutPercentage: 30,
  circumference: Math.PI,
  legend: {
    position: 'bottom'
  },
  animation: {
    animateRotate: false,
    animateScale: true
  }
};

var pieChart = new Chart(oilCanvas, {
  type: 'doughnut',
  data: oilData,
  options: chartOptions
});

</script>
</body>
</html>
@endsection