@extends('customers/layouts/main')

@section('title','adx-pay | Data Transaksi')

@section('content-header', 'Data Transaksi')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card mt-5">
          <div class="card-body p-2">
            <p class="text-center m-0"><strong>Riwayat Transaksi</strong></p>
          </div>
        </div>

        @foreach($mutasi as $mts)
        <div class="card">
          <div class="card-body p-2">
            <span class="float-left">{{$mts->updated_at}}</span>

            @if($mts->status == 2) 
            <span class="float-right text-danger text-uppercase"><strong>gagal</strong></span>
            @elseif($mts->status == 3) 
            <span class="float-right text-primary text-uppercase"><strong>refund</strong></span>
            @elseif($mts->status == 1) 
            <span class="float-right text-warning text-uppercase"><strong>pending</strong></span>
            @elseif($mts->status == 4) 
            <span class="float-right text-success text-uppercase"><strong>sukses</strong></span>
            @endif

            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            @if($mts->status == 2) 
            <div class="text-danger text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 3) 
            <div class="text-primary text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 1) 
            <div class="text-warning text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 4) 
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

 