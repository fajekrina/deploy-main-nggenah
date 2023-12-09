<html>
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
                    <h3 class="card-title">Tambah Data Lokasi Toko</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                        <form action="insertLokasi" method='POST' class="form-group">
                            @csrf
                            <label>Nama Toko</label>
                            <input type="text" id="nama_toko" name="nama_toko" class="form-control select2bs4" style="width: 100%;">
                            
                            <label>Latitude</label>
                            <input type="text" id="latitude" name="latitude" class="form-control select2bs4" style="width: 100%;">

                            <label>Longtitude</label>
                            <input type="text" id="longitude" name="longitude" class="form-control select2bs4" style="width: 100%;">
                            
                            <label>Accuracy</label>
                            <input type="text" id="accuracy" name="accuracy" class="form-control select2bs4" style="width: 100%;">
                            
                            <br>
                            <input type="button" onclick="getLocation()" class="btn btn-primary" value="GetLoc">
                            <input type="submit" class="btn btn-success" value="Simpan">
                            <a href="data_toko" class="btn btn-default">Kembali</a>
                        </form>
                        </div>
                    </div>
                </div><!-- /.card-body -->
                <div class="card-footer">
                    
                </div><!-- /.card-footer-->
            </div><!-- /.card -->
        </div><!--/. container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->
@endsection

@section('script')
<script>  
    var latitud = document.getElementById("latitude");
    var longitud = document.getElementById("longitude");
    var accury = document.getElementById("accuracy");
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        latitud.innerHTML = "Geolocation is not supported by this browser.";
        longitud.innerHTML = "Geolocation is not supported by this browser.";
        accury.innerHTML = "Geolocation is not supported by this browser.";
    }
    }

    function showPosition(position) {
    latitud.value = position.coords.latitude;
    longitud.value = position.coords.longitude;
    accury.value = position.coords.accuracy;
    
    }
</script>
@endsection
</html>
