@extends('cs/layouts/main')

@section('title','adx-pay | Dashboard')

@section('content-header', 'Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <!-- small card -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>Rp. {{number_format($saldo)}}</h3>

              <p>Total Saldo Utama</p>
            </div>
            <div class="icon">
              <i class="fas fa-wallet"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4">
          <!-- small card -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>-</h3>

              <p>Total Saldo Semua Customer</p>
            </div>
            <div class="icon">
              <i class="fas fa-wallet"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
      </div>
      <!-- ./col -->

      <div class="col-lg-4">
          <!-- small card -->
          <div class="small-box bg-warning">
            <div class="inner">
              <h3>-</h3>

              <p>Saldo Customer Services</p>
            </div>
            <div class="icon">
              <i class="fas fa-wallet"></i>
            </div>
            <a href="#" class="small-box-footer">
              More info <i class="fas fa-arrow-circle-right"></i>
            </a>
          </div>
      </div>
      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8 bg-dark pt-3 rounded">
        <h3 class="text-center">Pembayaran Tagihan</h3>
        <div class="row text-center p-5">
          <div class="col-md-4 col-4">
            <a href="" class="text-light"><i class="fa fa-bolt fa-2x"></i><h4>Listrik</h4></a>
          </div>
          <div class="col-md-4 col-4">
            <a href="" class="text-light"><i class="fa fa-tint fa-2x"></i><h4>PDAM</h4></a>
          </div>
          <div class="col-md-4 col-4">
            <a href="" class="text-light"><i class="fa fa-wifi fa-2x"></i><h4>WIFI</h4></a>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
    
    <div class="row mt-3 mb-3">
      <div class="col-md-2"></div>
      <div class="col-md-8 bg-dark pt-3 rounded">
        <h3 class="text-center">Isi Ulang</h3>
        <div class="row text-center pt-5 pb-5">
          <div class="col-md-3 col-3">
            <a href="/cs/transaksi/pulsa/1" class="text-light"><i class="fa fa-bolt fa-2x"></i><h4>Pulsa</h4></a>
          </div>
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-globe fa-2x"></i><h4>Kuota Internet</h4></a>
          </div>
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-ticket-alt fa-2x"></i><h4>Voucher</h4></a>
          </div>
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h4>Gopay</h4></a>
          </div>
        </div>
        <div class="row text-center pt-5 pb-5">
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h4>OVO</h4></a>
          </div>
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h4>DANA</h4></a>
          </div>
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h4>LinkAja</h4></a>
          </div>
          <div class="col-md-3 col-3">
            <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h4>ShopeePay</h4></a>
          </div>
        </div>
      </div>
      <div class="col-md-2"></div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

 