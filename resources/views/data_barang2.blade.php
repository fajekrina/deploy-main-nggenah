@extends('layouts/main')


<!DOCTYPE html>
<html lang="en">
@section('css_custom')    
  {{-- <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1"> --}}
  <meta name="_token" content="{{ csrf_token() }}">
@endsection

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Data Barang</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Data Barang</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section><!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Barang</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="card-tools">
                                {{-- <a href="#" class="nav-link">
                                    <button id="print-button" disabled onclick="printTerpilih()" type="button" class="btn btn-default">Cetak</button>
                                </a> --}}
                                <button  type="button"  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-konfirmasi-cetak" >
                                    <i class="fas fa-file-pdf mr-2"></i>
                                    Cetak Barcode
                                </button>
                            </div>
                            <div class="table-responsive">
                                <form action="" class="form-barcode" method="post">
                                    <table id="barang" class="table table-bordered table-hover" onload="viewbarang()">
                                        <thead>
                                            <tr>
                                                <th style="text-align: center"><input name="select_all" id="select_all" type="checkbox"></th>
                                                <th style="text-align: center" name="barcode" id="barcode">Barcode</th>
                                                <th style="text-align: center" name="id" id="id">ID Barang</th>
                                                <th style="text-align: center" name="nama" id="nama">Nama Barang</th>
                                                <th style="text-align: center" name="timestamp" id="timestamp">TimeStamp</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($barang as $data)
                                            <tr>
                                                <td style="text-align: center"><input value="{{ $data->id_barang }}" class="cb-child" id="select_item" name="select_item" type="checkbox"></td>
                                                <td style="text-align: center">
                                                    <?php
                                                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128)) . '">';
                                                    ?>
                                                    <br>
                                                    <?= $data->id_barang?>
                                                    <br>
                                                    <?= $data->nama?>
                                                </td>
                                                <td style="text-align: center">{{ $data->id_barang }}</td>
                                                <td style="text-align: center">{{ $data->nama }}</td>
                                                <td style="text-align: center">{{ $data->timestamp }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        {{-- <tfoot>
                                            <tr>
                                                <th></th>
                                                <th style="text-align: center">Barcode</th>
                                                <th style="text-align: center">ID Barang</th>
                                                <th style="text-align: center">Nama Barang</th>
                                                <th style="text-align: center">TimeStamp</th>
                                            </tr>
                                        </tfoot> --}}
                                    </table>
                                </form>
                            </div>
                        </div>   <!-- /.card-body -->
                    </div>  <!-- /.card -->
                </div>  <!-- /.col 12 -->
            </div>  <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal Start -->
<!-- @foreach ($barang as $barang2) -->
<div class="modal fade" id="modal-konfirmasi-cetak" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header bg-secondary">
                <h5 class="modal-title">Konfirmasi Cetak Barcode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fas fa-times-circle text-danger"></i>
                </button>
            </div>
            <div class="modal-body">

                <div class="container">

                    <!-- <form > -->
                    <form action="cetak_pdf"  method="POST">
                        @csrf

                        <!-- <input type="hidden" name="id_barang" value="{{ $barang2->id_barang }}">
                        
                        <div class="my-b form-group">
                            <label>Nama Barang: </label>
                            <h6>{{ $barang2->nama }}</h6>
                        </div> -->

                        <div class="my-3 form-group">
                            <label>Row [1 - 8]</label>
                            <input type="number" id="row1" name="row1" min="1" max="8" value="1" class="form-control num-without-style" placeholder="1-8">
                        </div>

                        <div class="my-3 form-group">
                            <label>Coloumn [1 - 5]</label>
                            <input type="number" id="col1" name="col1" min="1" max="5" value="1" class="form-control num-without-style" placeholder="1-5">
                        </div>
                        
                        <div class="modal-footer">
                            <button  type="submit" class="btn btn-sm btn-youtube">
                                <i class="fas fa-file-pdf mr-2"></i>
                                Print
                            </button>
                            <!-- <button   onclick="printPDF()" class="btn btn-sm btn-youtube">
                                <i class="fas fa-file-pdf mr-2"></i>
                                CETAK BARCODE
                            </button> -->
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- End Konfirmasi Cetak Barcode Modal --}}
<!-- @endforeach -->


<!-- Modal End -->
@endsection    


<!-- AJAX CHECKBOX -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
<script src="assets/plugins/jquery/jquery.min.js"></script>

@section('script')
<!-- Page specific script -->
<script>
    let yangDicheck = 0
    function viewbarang(){
        $.ajax({
            type:"get",
            url:"data_barang",
                success:function(data){
                    $('tbody').append(data[i].id_barang)
                    // for(var i=0;i<data.length;i++){
                      
                    //     // document.getElementById("id").value = data[i].nama;
                    //     // $('#kecamatan-dd').append('<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>');
                    // } 
                }
        })
    }
    // $('#select_all').change(function(){
    //     $('#select_item').prop("checked", $(this).prop("checked"))

    // })
    $("#select_all").on('click',function(){
        var isChecked = $("#select_all").prop('checked')
        $(".cb-child").prop('checked',isChecked)
        $('#print-button').prop('disabled', !isChecked)
        
    })

    $("#barang tbody").on('click','.cb-child',function(){
        if($(this).prop('checked')!=true){
            $("#select_all").prop('checked',false)
        }
        let semua_checkbox = $("#barang tbody .cb-child:checked")
        let print_button_non = (semua_checkbox.length>0)
        // console.log(print_button_non)
        $("#print-button").prop('disabled', !print_button_non)
    })

    function printPDF() {
        var row =  Number(document.getElementById("row2").value);
        var col =  Number(document.getElementById("col2").value);
        // var row =  2;
        // let col1 =  3;
        console.log(row);
        console.log(col);
        let semua_checkbox = $('#tabel1 tbody .cb-child:checked')
        let allId = []
        $.each(semua_checkbox, function(index, elm){
                allId.push(elm.value)
            })
        $.ajax({
            type:"POST",
            url:"cetak_pdf",
            data:{ids:allId,row:row,col:col},
            success: function(data) {

            console.log(allId)
            console.log(data)
        }
            
        })


    }

    // function printPDF() {
    //     var row =  Number(document.getElementById("row1").value);
    //     var col =  Number(document.getElementById("col1").value);
    //     // var row =  2;
    //     // let col1 =  3;
    //     console.log(row);
    //     console.log(col);
    //     let allcb = $("#table tbody .cb-child:checked")
    //     let allid = []
    //     $.each(allcb, function(index, elm){
    //             allid.push(elm.value)
    //         })
    //     $.ajax({
    //         type:"POST",
    //         url:"{{url('')}}/cetak_pdf",
    //         data:{ids:allid,row:row,col:col},
    //         success: function(data) {

    //         console.log(allid)
    //         console.log(data)
    //     }
            
    //     })
    // }

    // function printTerpilih () {
    //     let checkbox_terpilih = $('#barang tbody .cb-child:checked')
    //     let semua_id = []
    //     $.each(checkbox_terpilih,function(index,elm){
    //         semua_id.push(elm.value)
    //     })
    //     $.ajaxSetup({
    //         headers: {
    //             'X_CSRF-TOKEN' : $('meta[name="_token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url:"{{url('')}}/cetak_pdf",
    //         type:"post",
    //         data:'{"semua_id":"' + semua_id+'"}',
    //         success:function(data){
    //             console.log(data)
    //         }
    //     })
    //     // console.log(semua_id)
    //     // console.log("Print Terpilih")
    // }
</script>
@endsection
</html>
