@extends('cs/layouts/main')

@section('title','adx-pay | Transaksi Deposit')

@section('content-header', 'Transaksi Deposit')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body p-2">
            <p class="text-center m-0"><strong>Menunggu Konfirmasi</strong></p>
          </div>
        </div>

        @foreach($mutasi as $mts)
        @if($mts->status == 1) 
        <div class="card">
          <div class="card-body p-2">
            <span class="float-left">{{$mts->updated_at}}</span>
            <span class="float-right text-warning text-uppercase"><strong>pending</strong></span>

            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            @if($mts->status == 2) 
            <div class="text-danger text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 3) 
            <div class="text-primary text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 1)
            @if($mts->bukti_transfer == null) 
            <div class="text-warning text-justify">{{$mts -> username}} ingin menambah dompet sebesar Rp. {{number_format($mts -> jumlah_deposit)}}</div>
            @else
            <div class="text-warning text-justify">{{$mts -> username}} ingin menambah dompet sebesar Rp. {{number_format($mts -> jumlah_deposit)}} silahkan segera divalidasi</div>
            <!-- The Modal -->
            <div class="modal" id="bukti_transfer">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Bukti Transfer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="text-center">  
                      <img width="100%" src="{{asset('bukti_transfer/'.$mts->bukti_transfer)}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#bukti_transfer">Lihat Bukti transfer</button>
            <a id="valid-bt" mutasi-id="{{$mts->id}}" class="btn btn-success">Valid</a>
            <a id="invalid-bt" mutasi-id="{{$mts->id}}" class="btn btn-danger">Tidak Valid</a>
            @endif
            @elseif($mts->status == 4) 
            <div class="text-success text-justify">{{$mts -> note}}</div>
            @endif
          </div>
        </div>
        @endif
        @endforeach
      </div>

      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-body p-2">
            <p class="text-center m-0"><strong>Berhasil</strong></p>
          </div>
        </div>

        @foreach($mutasi as $mts)
        @if($mts->status == 4) 
        <div class="card">
          <div class="card-body p-2">
            <span class="float-left">{{$mts->updated_at}}</span>
            <span class="float-right text-success text-uppercase"><strong>sukses</strong></span>

            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            @if($mts->status == 2) 
            <div class="text-danger text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 3) 
            <div class="text-primary text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 1)
            @if($mts->bukti_transfer == null) 
            <div class="text-warning text-justify">{{$mts -> username}} ingin menambah dompet sebesar Rp. {{number_format($mts -> jumlah_deposit)}}</div>
            @else
            <div class="text-warning text-justify">{{$mts -> username}} ingin menambah dompet sebesar Rp. {{number_format($mts -> jumlah_deposit)}} silahkan segera divalidasi</div>
            <!-- The Modal -->
            <div class="modal" id="bukti_transfer">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Bukti Transfer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="text-center">  
                      <img width="100%" src="{{asset('bukti_transfer/'.$mts->bukti_transfer)}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#bukti_transfer">Lihat Bukti transfer</button>
            <a href="/cs/isi-dompet/valid/{{$mts->id}}" class="btn btn-success">Valid</a>
            <a href="/cs/isi-dompet/invalid/{{$mts->id}}" class="btn btn-danger">Tidak Valid</a>
            @endif
            @elseif($mts->status == 4) 
            <div class="text-success text-justify">{{$mts -> note}}</div>
            @endif
          </div>
        </div>
        @endif
        @endforeach
      </div>

      <div class="col-md-12 mt-5">
        <div class="card">
          <div class="card-body p-2">
            <p class="text-center m-0"><strong>Gagal</strong></p>
          </div>
        </div>

        @foreach($mutasi as $mts)
        @if($mts->status == 2) 
        <div class="card">
          <div class="card-body p-2">
            <span class="float-left">{{$mts->updated_at}}</span>
            <span class="float-right text-success text-uppercase"><strong>sukses</strong></span>

            <br><div>{{$mts -> phone}}</div>
            <div>({{$mts -> code}})</div>
            @if($mts->status == 2) 
            <div class="text-danger text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 3) 
            <div class="text-primary text-justify">{{$mts -> note}}</div>
            @elseif($mts->status == 1)
            @if($mts->bukti_transfer == null) 
            <div class="text-warning text-justify">{{$mts -> username}} ingin menambah dompet sebesar Rp. {{number_format($mts -> jumlah_deposit)}}</div>
            @else
            <div class="text-warning text-justify">{{$mts -> username}} ingin menambah dompet sebesar Rp. {{number_format($mts -> jumlah_deposit)}} silahkan segera divalidasi</div>
            <!-- The Modal -->
            <div class="modal" id="bukti_transfer">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Bukti Transfer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <div class="text-center">  
                      <img width="100%" src="{{asset('bukti_transfer/'.$mts->bukti_transfer)}}">
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <button class="btn btn-primary" data-toggle="modal" data-target="#bukti_transfer">Lihat Bukti transfer</button>
            <a href="/cs/isi-dompet/valid/{{$mts->id}}" class="btn btn-success">Valid</a>
            <a href="/cs/isi-dompet/invalid/{{$mts->id}}" class="btn btn-danger">Tidak Valid</a>
            @endif
            @elseif($mts->status == 4) 
            <div class="text-success text-justify">{{$mts -> note}}</div>
            @endif
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

