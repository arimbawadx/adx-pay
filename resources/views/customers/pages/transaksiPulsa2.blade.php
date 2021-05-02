@extends('cs/layouts/main')

@section('title','adx-pay | Transaksi Pulsa')

@section('content-header', 'Transaksi Pulsa')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="/cs/transaksi/pulsa/3">
          {{csrf_field()}}
          <div class="input-group">
            <input name="inquiry" value="{{$inquiry}}" type="hidden">
            <input name="no_hp" value="{{$phone}}" type="hidden">

            <select name="code" required class="custom-select">
              <option></option>
              @foreach($resultHargaPulsa2['message'] as $hargapulsa)
              @if($hargapulsa['provider_sub']=="REGULER" && $hargapulsa['operator_sub']==$inquiry)
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
                @elseif($hargapulsa['code']==$inquiry.'40')
                  Harga Rp. 42.000
                @elseif($hargapulsa['code']==$inquiry.'50')
                  Harga Rp. 52.000
                @elseif($hargapulsa['code']==$inquiry.'60')
                  Harga Rp. 62.000
                @elseif($hargapulsa['code']==$inquiry.'70')
                  Harga Rp. 72.000
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
                @elseif($hargapulsa['code']==$inquiry.'500')
                  Harga Rp. 502.000
                @endif
            </option>
              @endif
              @endforeach
            </select>
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Kirim</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

 