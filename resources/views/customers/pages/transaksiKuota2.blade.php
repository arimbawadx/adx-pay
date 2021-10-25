@extends('customers/layouts/main')

@section('title','adx-pay | Transaksi Kuota Internet')

@section('content-header', 'Transaksi Kuota Internet')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-12">
        <form class="card card-body" id="form-confirm" method="post" action="/customers/transaksi/kuota/3">
          {{csrf_field()}}
          <input name="no_hp" value="{{$phone}}" type="hidden">          
          <div class="form-group">
            <label for="code">Jenis Kuota</label>
            <select id="code" name="code" required class="form-control">
              <option value="">Pilih</option>
              @foreach($resultHargaPulsa2['message'] as $hargapulsa)
              @if($hargapulsa['provider_sub']=="INTERNET" && $hargapulsa['provider']==$provider)
              <option value="{{$hargapulsa['code']}}">
                {{$hargapulsa['description']}}  | Rp. {{ceil(number_format($hargapulsa['price']+6000))."000"}}
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

