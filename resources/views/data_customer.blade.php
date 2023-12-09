@extends('layouts/main')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"></h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Customer</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-tools">
                    <a href="/insertCustomer" class="nav-link">
                    <td>
                        <button type="button" class="btn btn-info">Tambah Data Customer Baru 1</button>
                    </td>
                    </a>
                </div>
                <div class="card-tools">
                    <a href="/insertCustomer2" class="nav-link">
                    <td>
                        <button type="button" class="btn btn-info">Tambah Data Customer Baru 2</button>
                    </td>
                    </a>
                </div>
                <div class="card-body">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            {{-- <th>No</th> --}}
                            <th>ID Customer</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Kelurahan</th>
                            <th>File Path</th>
                            <th>Foto</th>
                        </tr>
                        </thead>
                        @foreach($customer as $data)
                        <tr>  
                            {{-- <td>{{ $loop -> iteration }}</td> --}}
                            <td>{{ $data -> id_customer }}</td>
                            <td>{{ $data -> nama }}</td>
                            <td>{{ $data -> alamat }}</td>
                            <td>{{ $data -> nama_kelurahan }}</td>
                            <td>{{ $data -> file_path }}</td>
                            {{-- <td>{{ $data -> foto }}</td> --}}
                            <td><img src="{{ $data->foto }}" alt=""></td>
                        </tr>
                        @endforeach  
                        </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>
        </div><!--/. container-fluid -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection