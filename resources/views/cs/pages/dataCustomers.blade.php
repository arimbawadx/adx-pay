@extends('cs/layouts/main')

@section('title','adx-pay | Data Customer')

@section('content-header', 'Data Customer')

@section('content')
<!-- Content Wrapper. Contains page content -->
<section class="content">
  <!-- The Modal Tambah Customer-->
  <div class="modal" id="TambahDataCustomer">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Data Customer</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          <form method="post" action="/cs/users/data-customers">
            {{csrf_field()}}
              <div class="form-group">
                <label for="nama">Nama Customer</label>
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
        <button style="margin-bottom: 20px" type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#TambahDataCustomer">
          <i class="fa fa-plus"></i><span> Tambah</span>
        </button>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
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
            @foreach($dataCustomer as $i => $dataCustomer)
            <tr>
              <th>{{$i+1}}</th>
              <td>{{$dataCustomer -> name}}</td>
              <td>{{$dataCustomer -> username}}</td>
              <td>{{$dataCustomer -> phone_number}}</td>
              <td>{{$dataCustomer -> email}}</td>
              <td>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModalUbahDataCustomer{{$dataCustomer -> id}}">
                  <i class="fa fa-pen"></i><span></span>
                </button>

                <button cus-id="{{$dataCustomer -> id}}" nama-cus="{{$dataCustomer -> name}}" class="btn btn-danger delete_cus">
                  <i class="fa fa-trash"></i><span></span>
                </button>

              </td>
            </tr>
            <!-- The Modal -->
            <div class="modal" id="myModalUbahDataCustomer{{$dataCustomer -> id}}">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Ubah Data Customer</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form method="post" action="/cs/users/data-customers/update/{{$dataCustomer -> id}}">
                      {{csrf_field()}}
                        <div class="form-group">
                          <label for="nama">Nama Customer</label>
                          <input autocomplete="off" type="text" class="form-control" id="nama" name="nama" value="{{$dataCustomer -> name}}">
                        </div>
                        <div class="form-group">
                          <label for="no_hp">No HP </label>
                          <input autocomplete="off" type="number" class="form-control" id="no_hp" name="no_hp" value="{{$dataCustomer -> phone_number}}">
                        </div>
                        <div class="form-group">
                          <label for="email">Email</label>
                          <input required="" autocomplete="off" type="email" class="form-control" id="email" name="email" value="{{$dataCustomer -> email}}">
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

 