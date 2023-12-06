<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/v/dt/dt-1.13.8/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
</head>
<body>
    {{-- Content Index --}}
    <div class="content">
        {{-- Navbar --}}
        @include('Navigation.navbar')
        {{-- End Navbar --}}

        <div class="col-lg-12">
            <div class="panel panel-default" style="padding: 20px">
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="table-responsive table-bordered">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Title</th>
                                    <th>Tahun Terbit</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $no=1; @endphp
                               @foreach ($book as $item)
                               <tr>
                                <td>{{ $no++ }}</td>
                                   <td>{{ $item->title }}</td>
                                   <td>{{ $item->terbit }}</td>
                                   <td>
                                    <form action="#"
                                        method="post" enctype="multipart/form-data">
                                        @method('delete')
                                        @csrf

                                        <a href=""
                                            class="btn btn-success float-right">Ubah</a>
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Ingin Menghapus ini?');">Delete</button>
                                    </form>
                                   </td>
                               </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
    </div>
    {{-- End Content --}}

    {{-- Form Insert --}}
    <div class="insert" style="margin-top: 20px">
        <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Content Row -->
                    <div class="coloum">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tambah Data Buku
                                </div>
                                <form Action="/" method="post">
                                    @csrf
                                    <div class="panel-body">
                                        <label>Title</label>
                                        <input type="text" class="form-control" name="title">
                                    </div>
                                    <div class="panel-body">
                                        <label>Tahun Terbit</label>
                                        <input type="text" class="form-control" name="terbit">
                                    </div>
                                    <div class="panel-body">
                                        <br>
                                        <button type="reset" class="btn btn-warning">Reset</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->


                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    </div>
    {{-- End Form Insert --}}

      <script type="text/javascript">
        $('#example').DataTable();
      </script>
</body>
</html>
