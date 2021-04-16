@extends('layouts/main')

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

              <p>Saldo</p>
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
      <div class="col-md-12">
        <table class="table table-striped text-center">
          <thead style="background-color: #343a40">
            <tr><th colspan="4" class="text-center">PULSA REGULER AXIS</th></tr>
            <tr>
              <th>Kode</th>
              <th>Produk</th>
              <th>Harga</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach($resultHargaPulsa2['message'] as $hargapulsa)
            @if($hargapulsa['provider_sub']=="REGULER" && $hargapulsa['provider']=="AXIS")
            <tr>
              <td>{{$hargapulsa['code']}}</td>
              <td>{{$hargapulsa['description']}}</td>
              <td>{{number_format($hargapulsa['price']+2000)}}</td>
              <td>{{$hargapulsa['status']}}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

 