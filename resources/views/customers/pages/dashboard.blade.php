@extends('customers/layouts/main')

@section('title','adx-pay | Dashboard')

@section('content-header', 'Dashboard')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-info alert-dismissible">
          <h5><i class="icon fas fa-info"></i> Info</h5>
          Silahkan lakukan transaksi untuk mendapatkan coin! 
        </div>
      </div>

      <div class="col-lg-4">
        <!-- small card -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>Rp. {{number_format($saldo, 0, '', '.')}}</h3>

            <p>Uang Saya</p>
          </div>
          <div class="icon">
            <i class="fas fa-wallet"></i>
          </div>
          <a href="/customers/transaksi/isi-dompet" class="small-box-footer">
            Isi Dompet <i class="fas fa-plus-circle"></i>
          </a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-4">
        <!-- small card -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{number_format($point, 0, '', '.')}}</h3>

            <p>Coin Saya</p>
            <!-- <p>Setara Rp. {{number_format($point, 0, '', '.')}}, 00</p> -->
          </div>
          <div class="icon">
            <i class="fas fa-donate"></i>
          </div>

          <!-- The Modal Tarik Point-->
          <div class="modal" id="TarikPoint">
            <div class="modal-dialog">
              <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                  @if($point>0)
                  <div class="alert alert-warning alert-dismissible">
                    <h5><i class="icon fas fa-donate"></i> Info Coin Anda</h5>
                    Coin anda sebesar <strong>{{number_format($point, 0, '', '.')}}</strong> setara dengan <strong>Rp. {{number_format($point/10, 0, '', '.')}}, 00</strong>. Yakin tarik?
                  </div>
                  <form method="post" action="/customers/tarik-coin">
                    @csrf                      
                    <button type="submit" class="btn btn-primary">Tarik</button>
                  </form>
                  @else
                  <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-donate"></i> Info Coin Anda</h5>
                    Jangan Halu, anda tidak punya coin! 
                  </div>
                  @endif
                </div>
              </div>
            </div>
          </div>
          <a data-toggle="modal" data-target="#TarikPoint" class="small-box-footer">
            Tarik Coin <i class="fas fa-arrow-circle-down"></i>
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
              <a href="/customers/transaksi/pulsa/1" class="text-light"><i class="fa fa-mobile fa-2x"></i><h6>Pulsa</h6></a>
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
              <a href="/customers/transaksi/ovo/1" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>OVO</h6></a>
            </div>
            <div class="col-md-3 col-3">
              <a href="/customers/transaksi/dana/1" class="text-light"><i class="fa fa-wallet fa-2x"></i><h6>DANA</h6></a>
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

