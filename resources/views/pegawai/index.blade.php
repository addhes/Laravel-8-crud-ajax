@include('template.header');

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

    @include('template.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

     @include('template.navbar')           

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#pegawaiModal">
                                Tambah <a class="fa fa-plus btn-success"></a>
                              </button>
                        </div>
                    <!-- DataTales Example -->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <td>No</td>
                                        <td>Nama</td>
                                        <td>Bonus</td>
                                        <td>Action</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list_pegawai as $result => $hasil)
                                    <tr id="sid{{ $hasil->id }}">
                                        <td> {{ $result + $list_pegawai->firstitem() }} </td>
                                        <td>{{ $hasil->nama }}</td>    
                                        <td>@currency($hasil->bonus)</td>
                                        <td>
                                            <a href="#" class="btn btn-warning btn-edit" data-id="{{ $hasil->id }}">Edit</a>
                                            <a href="#" onclick="deletePegawai({{ $hasil->id }})" class="btn btn-danger btn-del">Delete</a>
                                        </td>
                                    </tr>                     
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

  <!-- Modal -->
  <div class="modal fade" id="pegawaiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Pegawai</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="pegawaiForm">
              @csrf
              <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label">Pembayaran</label>
                  <div class="col-sm-6">
                    <input type="text" name="nama" id="nama" class="form-control">
                  </div>
              </div>
              <div class="form-group row">
                <label for="bonus" class="col-sm-2 col-form-label">Buruh</label>
                <div class="col-sm-7">
                  <input type="number" name="bonus" id="bonus" class="form-control">
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 col-form-label"></label>
                  <div class="col-sm-4">
                    <a href="" class="addburuh btn btn-success">+</a>
                  </div>

                  <div class="buruh"></div>

                </div>       
            </div>       
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
      </div>
    </div>
  </div>            




@include('template.footer');