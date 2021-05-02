@extends('cs/layouts/main')

@section('title','adx-pay | Data Customer Services')

@section('content-header', 'Data Customer Services')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <!-- The Modal Tambah Customer Services-->
  <div class="modal" id="TambahDataCustomerServices">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Customer Services</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="/cs/users/data-cs">
            {{csrf_field()}}
              <div class="form-group">
                <label for="nama">Nama Customer Services</label>
                <input required="" autocomplete="off" type="text" class="form-control" id="nama" name="nama">
              </div>
              <div class="form-group">
                <label for="no_hp">No HP</label>
                <input required="" autocomplete="off" type="number" class="form-control" id="no_hp" name="no_hp">
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input required="" autocomplete="off" type="email" class="form-control" id="email" name="email">
              </div>
              

              <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>

        <!-- Modal footer -->
        <!-- <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div> -->

      </div>
    </div>
  </div>


  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <button style="margin-bottom: 20px" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#TambahDataCustomerServices">
          <i class="fa fa-plus"></i><span> Tambah</span>
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <table id="datatables" class="table table-striped table-responsive text-center">
          <thead style="background-color: #343a40">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Username</th>
              <th>No HP</th>
              <th>Email</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            @foreach($dataCS as $i => $dataCS)
            <tr>
              <th>{{$i+1}}</th>
              <td>{{$dataCS -> name}}</td>
              <td>{{$dataCS -> username}}</td>
              <td>{{$dataCS -> phone_number}}</td>
              <td>{{$dataCS -> email}}</td>
              <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalUbahDataCS{{$dataCS -> id}}">
                  <i class="fa fa-pen"></i><span></span>
                </button>

                <button cs-id="{{$dataCS -> id}}" nama-cs="{{$dataCS -> name}}" class="btn btn-danger delete_cs">
                  <i class="fa fa-trash"></i><span></span>
                </button>

              </td>
            </tr>
            <!-- The Modal -->
            <div class="modal" id="myModalUbahDataCS{{$dataCS -> id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Customer Services</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="post" action="/cs/users/data-cs/update/{{$dataCS -> id}}">
                      {{csrf_field()}}
                        <div class="form-group">
                          <label for="nama">Nama Customer Services</label>
                          <input autocomplete="off" type="text" class="form-control" id="nama" name="nama" value="{{$dataCS -> name}}">
                        </div>
                        <div class="form-group">
                          <label for="no_hp">No HP </label>
                          <input autocomplete="off" type="number" class="form-control" id="no_hp" name="no_hp" value="{{$dataCS -> phone_number}}">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input required="" autocomplete="off" type="email" class="form-control" id="email" name="email" value="{{$dataCS -> email}}">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </form>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>
<!-- /.content-wrapper -->
@endsection

 