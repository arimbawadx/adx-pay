<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('lte/dist/img/favicon.ico') }}">
  <title>adx-pay | Log in</title>

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
        <!-- <p class="login-box-msg">Silahkan login sayangg</p> -->
        <form action="/login-check" method="post">
          {{ csrf_field() }}
          <div class="input-group mb-3">
            <input required type="text" class="form-control" name="username" autocomplete="off" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input required type="password" class="form-control" name="password" autocomplete="off" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <!-- <a href="/customers/daftar">Belum punya akun? Buat Akun</a> -->  
            </div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
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
