@extends('customers/layouts/main')

@section('title','adx-pay | Isi Dompet')

@section('content-header', 'Isi Dompet')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="/customers/transaksi/isi-dompet/proses">
          {{csrf_field()}}
          <div class="input-group">
            <input required="" autocomplete="off" type="number" class="form-control" name="jumlah_isi" placeholder="Masukan Jumlah Pengisian">
            <div class="input-group-append">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>     
        </form>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body p-2">
            <p class="text-center m-0"><strong>Transaksi</strong></p>
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
            <form action="" method="post">
            <div class="text-warning text-justify">{{$mts -> note}} di sini:</div>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="customFile">
              <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            <button type="submit" class="btn btn-primary">Confirm</button>
            </form>
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

 