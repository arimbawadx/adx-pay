@extends('customers/layouts/main')

@section('title','adx-pay | Transaksi DANA')

@section('content-header', 'Transaksi DANA')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12">
        <form class="card card-body" id="form-confirm" method="post" action="/customers/transaksi/dana/3">
          {{csrf_field()}}
          <input name="inquiry" value="{{$inquiry}}" type="hidden">
          <input name="no_hp" value="{{$phone}}" type="hidden">
          <div class="form-group">
            <label for="code">Jumlah Dana</label>
            <select id="code" name="code" required class="form-control">
              <option value="">Pilih</option>
              @foreach($resultHargaPulsa2['message'] as $hargapulsa)
              @if($hargapulsa['provider_sub']=="LAIN" && $hargapulsa['operator_sub']==$inquiry)
              <option value="{{$hargapulsa['code']}}">{{$hargapulsa['description']}}  |  
                @if($hargapulsa['code']==$inquiry.'5')
                Harga  Rp. 7.000
                @elseif($hargapulsa['code']==$inquiry.'10')
                Harga Rp. 12.000
                @elseif($hargapulsa['code']==$inquiry.'12')
                Harga Rp. 14.000
                @elseif($hargapulsa['code']==$inquiry.'15')
                Harga Rp. 17.000
                @elseif($hargapulsa['code']==$inquiry.'20')
                Harga Rp. 22.000
                @elseif($hargapulsa['code']==$inquiry.'25')
                Harga Rp. 27.000
                @elseif($hargapulsa['code']==$inquiry.'30')
                Harga Rp. 32.000
                @elseif($hargapulsa['code']==$inquiry.'35')
                Harga Rp. 37.000
                @elseif($hargapulsa['code']==$inquiry.'40')
                Harga Rp. 42.000
                @elseif($hargapulsa['code']==$inquiry.'45')
                Harga Rp. 47.000
                @elseif($hargapulsa['code']==$inquiry.'50')
                Harga Rp. 52.000
                @elseif($hargapulsa['code']==$inquiry.'60')
                Harga Rp. 62.000
                @elseif($hargapulsa['code']==$inquiry.'70')
                Harga Rp. 72.000
                @elseif($hargapulsa['code']==$inquiry.'75')
                Harga Rp. 77.000
                @elseif($hargapulsa['code']==$inquiry.'80')
                Harga Rp. 82.000
                @elseif($hargapulsa['code']==$inquiry.'90')
                Harga Rp. 92.000
                @elseif($hargapulsa['code']==$inquiry.'100')
                Harga Rp. 102.000
                @elseif($hargapulsa['code']==$inquiry.'150')
                Harga Rp. 152.000
                @elseif($hargapulsa['code']==$inquiry.'200')
                Harga Rp. 202.000
                @elseif($hargapulsa['code']==$inquiry.'250')
                Harga Rp. 252.000
                @elseif($hargapulsa['code']==$inquiry.'300')
                Harga Rp. 302.000
                @elseif($hargapulsa['code']==$inquiry.'400')
                Harga Rp. 402.000
                @elseif($hargapulsa['code']==$inquiry.'500')
                Harga Rp. 502.000
                @endif
              </option>
              @endif
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="metode_pembayaran">Metode Pembayaran</label>
            <select id="metode_pembayaran" name="metode_pembayaran" required class="form-control">
              <option value="">Pilih</option>
              <option value="Hutang">Bayar Nanti</option>
              <option value="Dompet">Dompet | Saldo Anda Rp. {{number_format($saldoCustomers['saldo'], 0, '', '.')}}</option>
            </select>
          </div>
          <button id="btn-trx-confirm" class="btn btn-primary btn-block" type="button">Kirim</button>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

