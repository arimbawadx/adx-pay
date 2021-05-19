<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('lte/dist/img/favicon.ico') }}">
  <title>adx-pay | Daftar</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition dark-mode login-page">
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-default">
    <div class="card-header text-center">
      <a href="#" class="h1"><b>adx</b> - pay</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Daftar dulu yaaa</p>
      <form action="/customers/registering" method="post">
        {{ csrf_field() }}
        <div class="form-group">
          <input required="" autocomplete="off" type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
        </div>
        <div class="form-group">
          <input required="" autocomplete="off" type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Masukan No HP">
        </div>
        <div class="form-group">
          <input required="" autocomplete="off" type="email" class="form-control" id="email" name="email" placeholder="Masukan Email">
        </div>
        <div class="row">
          <div class="col-8">
            <a href="/">Sudah punya akun? Login</a>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Buat Akun</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.min.js') }}"></script>
@include('sweetalert::alert')
</body>
</html>
