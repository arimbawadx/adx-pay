<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="{{ asset('lte/dist/img/favicon.ico') }}">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('lte/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('lte/dist/css/adminlte.min.css') }}">
  <!-- datatables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
</head>
<body onload="preloaderFunction()" class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('cs/layouts/header')
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  @include('cs/layouts/sidebar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('content-header')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Page of @yield('content-header')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
      <div class="d-flex justify-content-center">
        <div id="spinner" class="spinner-border text-primary">
          <span class="sr-only">Loading...</span>
        </div>
      </div>
      
      <div style="display: none;" id="content">  
        @yield('content')
      </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  @include('cs/layouts/footer')
</div>
<!-- ./wrapper -->

<script>
  var preloader = document.getElementById('spinner');
  var content = document.getElementById('content');
  function preloaderFunction() {
    preloader.style.display = 'none';
    content.style.display = 'block';
  }
</script>
<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('lte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('lte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('lte/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('lte/dist/js/adminlte.js') }}"></script>
<!-- datatables -->
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
  $(document).ready( function () {
    // datatables
    $('#datatables').DataTable();
    // end datatables

    // delete cs
    $('.delete_cs').click(function(){
    var cs_id=$(this).attr('cs-id');
    var nama_cs=$(this).attr('nama-cs');

      swal({
      title: "Yakin hapus "+nama_cs+" ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location="/cs/users/data-cs/delete/"+cs_id;
        swal("Data terhapus", {
        icon: "success",
        });
      } else {
        swal({
          title: "Jangan Ragu!",
          icon: "warning",
        });
      }
    });
  });
  // end delete cs

  // delete customer
    $('.delete_cus').click(function(){
    var cus_id=$(this).attr('cus-id');
    var nama_cus=$(this).attr('nama-cus');

      swal({
      title: "Yakin hapus "+nama_cus+" ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.location="/cs/users/data-customers/delete/"+cus_id;
        swal("Data terhapus", {
        icon: "success",
        });
      } else {
        swal({
          title: "Jangan Ragu!",
          icon: "warning",
        });
      }
    });
  });
  // end delete customer

});
</script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('lte/plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
<script src="{{ asset('lte/plugins/raphael/raphael.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('lte/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('lte/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="{{ asset('lte/dist/js/demo.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
@include('sweetalert::alert')
</body>
</html>
