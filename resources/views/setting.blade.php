@extends('layouts.top')
@section('content')
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Setting</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
  <!-- Daterange picker -->
  <!-- summernote -->
  <!-- Data table -->
  <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css')}}">
  <link rel="stylesheet" href="{{asset('https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css')}}">
  <script src="{{asset('https://code.jquery.com/jquery-3.5.1.js')}}"></script>
  <script src="{{asset('https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js')}}"></script>

    <script>
        $(document).ready(function () {
  $('#example').DataTable();
});
    </script>

    <style>
      btn{
        color:white;
      }
    </style>
</head>

<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active"><a href="{{url('/aak')}}">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container">
      <div class="row">
          <!-- left column -->
          <div class="col-md-6">
      <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Setting Target</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{url('updateset')}}" method="post" class="form-horizontal">
              {{ csrf_field() }}
                <div class="card-body">
                <h6>Merubah target setiap layanan</h6>
                  <div class="form-group row">
                  @foreach($setting as $s)
                  <input type="hidden" name="id_set" value="{{ $s->id_set }}">
                    <label class="col-sm-3 col-form-label">Dispensasi</label>
                    <div class="input-group col-sm-5">
                      <input type="number" class="form-control" name="dispen" value="{{ $s->dispensasi }}">
                      <div class="input-group-append">
                    <span class="input-group-text">Hari</span>
                  </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Yudisium</label>
                    <div class="input-group col-sm-5">
                      <input type="number" class="form-control" name="yudi" value="{{ $s->yudisium }}">
                      <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Cuti</label>
                    <div class="input-group col-sm-5">
                      <input type="number" class="form-control" name="cut" value="{{ $s->cuti }}">
                      <div class="input-group-append">
                    <span class="input-group-text">Hari</span>
                  </div></div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">BST</label>
                    <div class="input-group col-sm-5">
                      <input type="number" class="form-control" name="bst" value="{{ $s->bst }}">
                      <div class="input-group-append">
                    <span class="input-group-text">Hari</span>
                  </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <input type="submit" class="btn btn-info" value="Update">
                </div>
                
                  @endforeach
                <!-- /.card-footer -->
              
             
            </div>
    </div>
    <div class="col-md-6">
            <!-- /.cardo -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Semester</h3>
                </div>
               <div class="card-body">
               <h6>Merubah Semester</h6>
               <div class="form-group row">
                  @foreach($setting as $s)
                  <input type="hidden" name="id_set" value="{{ $s->id_set }}">
                    <label class="col-sm-3 col-form-label">Ganjil awal</label>
                    <div class="input-group col-sm-5">
                      <input type="date" class="form-control" name="gjlawal" value="{{ $s->gjlawal }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Ganjil Akhir</label>
                    <div class="input-group col-sm-5">
                      <input type="date" class="form-control" name="gjlakhir" value="{{ $s->gjlakhir }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Genap Awal</label>
                    <div class="input-group col-sm-5">
                      <input type="date" class="form-control" name="gnpawal" value="{{ $s->gnpawal }}">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Genap Akhir</label>
                    <div class="input-group col-sm-5">
                      <input type="date" class="form-control" name="gnpakhir" value="{{ $s->gnpakhir }}">
                    </div>
                  </div>
                  </div>
                   <div class="card-footer">
                  <input type="submit" class="btn btn-info" value="Update">
                </div>
              </div>
              
          </div>
    </div>
  </div>
    <!-- /.content -->
</div>
            
  @endforeach
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('dist/js/demo.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>
<!-- Data table -->

</body>
</html>
@endsection