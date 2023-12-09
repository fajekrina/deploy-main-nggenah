@extends('layouts.main')

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
                    <h3 class="card-title">Data Toko</h3>
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
                    <a href="/insertLokasi" class="nav-link">
                        <td>
                            <button type="button" class="btn btn-primary">Tambah Toko</button>
                        </td>
                    </a>
                </div>    
                <div class="card-body">
                    <div class="table-responsive">
                        <table id= "toko" class="table table-striped" >   
                            <thead>
                                <tr>
                                    
                                    <th class="text-center">Barcode</th>
                                    <th class="text-center">ID Toko</th>
                                    <th class="text-center">Nama Toko</th>
                                    <th class="text-center">Latitude</th>
                                    <th class="text-center">Longitude</th>
                                    <th class="text-center">Accuracy</th>
                                </tr>
                            </thead>
                            @foreach($toko as $data)
                                <tr>
                                    <td style="text-align: center">
                                        <?php
                                        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->barcode, $generator::TYPE_CODE_128)) . '">';
                                        ?>
                                        <br>
                                        <?= $data->barcode?>
                                    </td>
                                    <td>{{ $data->barcode }}</td>
                                    <td>{{ $data->nama_toko }}</td>
                                    <td>{{ $data->latitude }}</td>
                                    <td>{{ $data->longitude }}</td>
                                    <td>{{ $data->accuracy }}</td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    Footer
                </div>
                <!-- /.card-footer-->
            </div>            
        </div><!--/. container-fluid -->
    </section> <!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection