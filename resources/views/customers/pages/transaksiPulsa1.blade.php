@extends('customers/layouts/main')

@section('title','adx-pay | Transaksi Pulsa')

@section('content-header', 'Transaksi Pulsa')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12">
        <form class="card card-body" method="post" action="/customers/transaksi/pulsa/2">
          {{csrf_field()}}
          <div class="input-group">
            <input id="no_tujuan" required="" autocomplete="off" type="number" class="form-control" name="no_hp" placeholder="Masukan Nomor Tujuan">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Selanjutnya</button>
            </div>
          </div>     
        </form>
      </div>
      <div class="col-md-6 col-12">
        <div class="card">
          <div class="card-body p-2">
            <p class="text-center m-0"><strong>Riwayat Transaksi</strong></p>
          </div>
        </div>

        @foreach($mutasi as $mts)
        <div class="card">
          <div class="card-body p-2">
            <span class="float-left">{{$mts->created_at}}</span>

            @if($mts->status == 2) 
            <span class="float-right text-danger text-uppercase"><strong>gagal</strong></span>
            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            <div class="text-danger text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 3) 
            <span class="float-right text-primary text-uppercase"><strong>refund</strong></span>
            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            <div class="text-primary text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 1) 
            <span class="float-right text-warning text-uppercase"><strong>pending</strong></span>
            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            <div class="text-warning text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 4) 
            <span class="float-right text-success text-uppercase"><strong>sukses</strong></span>
            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            <div class="text-success text-justify">{{$mts -> note}}</div>
            @endif
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

