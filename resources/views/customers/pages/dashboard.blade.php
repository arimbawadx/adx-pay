@extends('customers/layouts/main')

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
              <h3>Rp. {{number_format($saldo, 0, '', '.')}}</h3>

              <p>Uangg Sayaaaa</p>
            </div>
            <div class="icon">
              <i class="fas fa-wallet"></i>
            </div>
            <a href="/customers/transaksi/isi-dompet" class="small-box-footer">
              Isiin Dompet <i class="fas fa-plus-circle"></i>
            </a>
          </div>
      </div>
      <!-- ./col -->
    </div>

    <!-- pembayaran tagihan -->
    <!-- <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8 bg-dark pt-3 rounded">
          <h3 class="text-center">Pembayaran Tagihan</h3>
          <div class="row text-center p-5">
            <div class="col-md-4 col-4">
              <a href="" class="text-light"><i class="fa fa-bolt fa-2x"></i><h6>Listrik</h6></a>
            </div>
            <div class="col-md-4 col-4">
              <a href="" class="text-light"><i class="fa fa-tint fa-2x"></i><h6>PDAM</h6></a>
            </div>
            <div class="col-md-4 col-4">
              <a href="" class="text-light"><i class="fa fa-wifi fa-2x"></i><h6>WIFI</h6></a>
            </div>
          </div>
        </div>
      </div>
    </div> -->
    <!-- end pembayaran tagihan -->

    <div class="container">
      <div class="row mt-3 mb-3 justify-content-center">
        <div class="col-md-8 bg-dark pt-3 rounded">
          <h3 class="text-center">Belanja</h3>
          <div class="row text-center pt-4 pb-4">
            <div class="col-md-3 col-3">
              <a href="/cs/transaksi/pulsa/1" class="text-light"><i class="fa fa-mobile fa-2x"></i><h6>Pulsa</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-globe fa-2x"></i><h6>Kuota Internet</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-ticket-alt fa-2x"></i><h6>Voucher</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>Gopay</h6></a>
            </div>
          </div>
          <div class="row text-center pt-4 pb-4">
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>OVO</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>DANA</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>LinkAja</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>ShopeePay</h6></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

 