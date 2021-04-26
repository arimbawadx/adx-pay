@extends('cs/layouts/main')

@section('title','adx-pay | Transaksi Pulsa')

@section('content-header', 'Transaksi Pulsa')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <form method="post" action="/cs/transaksi/pulsa/2">
          {{csrf_field()}}
          <div class="form-group">
            <input required="" autocomplete="off" type="number" class="form-control" name="no_hp" placeholder="Masukan Nomor Tujuan">
          </div>          
          <button type="submit" class="btn btn-primary">Selanjutnya</button>
        </form>
      </div>
      <div class="col-md-6">
        <div class="card">
          <div class="card-body">
            This is some text within a card body.
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

 