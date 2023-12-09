@extends('layouts/main')


<!DOCTYPE html>
<html lang="en">

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
                            <button  type="button"  class="btn btn-sm btn-primary"  data-toggle="modal" data-target="#modal-konfirmasi-cetak" >
                                <i class="fas fa-file-pdf mr-2"></i>
                                Print All
                            </button>
                            <button disabled id="button-print-pdf" class="btn btn-sm btn-info" data-toggle="modal" data-target="#modal-konfirmasi-cetak-1">
                                <i class="fas fa-file-pdf mr-2"></i>
                                Print Selected
                            </button>
                            <br><br>
                            <form action="" class="form-barcode" method="post">
                                @csrf
                                <table id="tabel1" name="tabel1" class="table table-bordered table-hover">
                                    <thead class="thead-dark">
                                        <th>
                                            <input type="checkbox" name="head-cb" id="head-cb">
                                        </th>
                                        <th scope="col">ID Barang</th>
                                        <th scope="col">Nama Barang</th>
                                        <th>Barcode</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($barang as $barang)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" class="cb-child" value="{{ $barang->id_barang }}">
                                                </td>
                                                <td>{{ $barang->id_barang }}</td>
                                                <td>{{ $barang->nama }}</td>
                                                <td>
                                                <?php
                                                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                                                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($barang->id_barang, $generator::TYPE_CODE_128,  $widthFactor = 1.5, $height = 37,))                                            . '">';
                                                    ?>
                                                    <br>
                                                    <?= $barang->id_barang?>
                                                    <br>
                                                    <?= $barang->nama?>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </form>
                        </div>   <!-- /.card-body -->
                    </div>  <!-- /.card -->
                </div>  <!-- /.col 12 -->
            </div>  <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

<!-- Modal Start -->
<!-- @foreach ($barang2 as $barang2) --> 
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
                    <form action="/barcode/cetak_pdf"  method="POST">
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
                                CETAK BARCODE
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



<!-- MODAL 2 -->
<!-- Modal Start -->
<!-- @foreach ($barang2 as $barang2) -->
<div class="modal fade" id="modal-konfirmasi-cetak-1" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true">
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
                    <form action=""  method="">
                        @csrf
                        <div class="my-3 form-group">
                            <label>Row [1 - 8]</label>
                            <input type="number" id="row2" name="row2" min="1" max="8" value="1" class="form-control num-without-style" placeholder="1-8">
                        </div>

                        <div class="my-3 form-group">
                            <label>Coloumn [1 - 5]</label>
                            <input type="number" id="col2" name="col2" min="1" max="5" value="1" class="form-control num-without-style" placeholder="1-5">
                        </div>
                        
                        <div class="modal-footer">
                            
                            <button  onclick="printPDF()" class="btn btn-sm btn-youtube">
                                <i class="fas fa-file-pdf mr-2"></i>
                                CETAK BARCODE
                            </button>
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




@section('script')

<!-- Checkbox -->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

<!-- Export-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script> 





<script>

$('#head-cb').on('click',function(){
    var isChecked = $('#head-cb').prop('checked')
    $('.cb-child').prop('checked',isChecked)
    $('#button-print-pdf').prop('disabled',!isChecked)
})

$('#tabel1 tbody').on('click','.cb-child',function(){
    if($(this).prop('checked')!=true){
        $('#head-cb').prop('checked',false)
    }

    let semua_checkbox = $('#tabel1 tbody .cb-child:checked')
    let button_print_semua = (semua_checkbox.length>0)
    $('#button-print-pdf').prop('disabled',!button_print_semua)
})

$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

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
        url:"{{url('')}}/barcode/cetak_pdf1/",
        data:{ids:allId,row:row,col:col},
        success: function(data) {

         console.log(allId)
         console.log(data)
      }
        
    })


}
   

</script>
@endsection
</html>
