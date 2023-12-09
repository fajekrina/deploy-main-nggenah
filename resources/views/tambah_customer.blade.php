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
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Customer Baru 1</h3>
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
                            <form action="insertCustomer" method='POST' class="form-group">
                              @csrf
                              {{-- <label>Id Customer</label>
                              <input type="text" id="idcust" name="idcust" class="form-control select2bs4" style="width: 100%;"> --}}
                              
                              <label>Nama Customer</label>
                              <input type="text" id="nama" name="nama" class="form-control select2bs4" style="width: 100%;">
                              
                              <label>Alamat</label><br>
                              <input type="text" id="alamat" name="alamat" class="form-control select2bs4" style="width: 100%;">

                              <label>Provinsi</label>
                              <select name="provinsi-dd" class="form-control" id="provinsi-dd">
                                <option value="0" disabled="true" selected="true"> - Pilih Provinsi - </option>
                                @foreach ( $provinsi as $prov )
                                <option value="{{ $prov->id_provinsi }}">{{ $prov->nama_provinsi }}</option>
                                @endforeach
                              </select>
                              
                              <label>Kota</label>
                              <select name="kota-dd" class="form-control" id="kota-dd">
                                <option value="0" disabled="true" selected="true"> - Pilih Kota - </option>
                                {{-- <option value="0" disabled="true" selected="true"> - Pilih Kota - </option> --}}
                                {{-- @foreach ( $kota as $kot )
                                <option value="{{ $kot->id_kota }}">{{ $kot->nama_kota }}</option>
                                @endforeach --}}
                              </select>
                              
                              <label>Kecamatan</label>
                              <select name="kecamatan-dd" class="form-control" id="kecamatan-dd">
                                <option value="0" disabled="true" selected="true"> - Pilih Kecamatan - </option>
                                {{-- @foreach ( $kecamatan as $kec )
                                <option value="{{ $kec->id_kecamatan }}">{{ $kec->nama_kecamatan }}</option>
                                @endforeach --}}
                              </select>
                              
                              <label>Kelurahan</label>
                              <select name="kelurahandd" class="form-control" id="kelurahandd">
                                <option value="0" disabled="true" selected="true"> - Pilih Kelurahan - </option>
                                {{-- @foreach ( $kelurahan as $kel )
                                <option value="{{ $kel->id_kelurahan }}">{{ $kel->nama_kelurahan }}</option>
                                @endforeach --}}
                              </select>
                              
                              <label>kodepos</label>
                              <select name="kodepos-dd" class="form-control" id="kodepos-dd">
                                <option value="0" disabled="true" selected="true"> - Pilih Kodepos - </option>
                                {{-- @foreach ( $kodepos as $kdpos )
                                <option value="{{ $kdpos->id_kelurahan }}">{{ $kdpos->kodepos }}</option>
                                @endforeach --}}
                              </select>
                              <label>Hasil Ambil Gambar (WebCam)</label>
                              {{-- Start Modal Ambil Foto --}}
                              <div class="modal fade" id="modal-ambil-foto" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title">POSE SEK</h5>
                                            <button type="button" class="close tutup-modal" data-dismiss="modal" aria-label="Close">
                                                <i class="fas fa-times-circle "></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">

                                            <div class="container">

                                                <div class="modal-wrapper">
                                                    <div>
                                                        <div id="my_camera" class="modal-kontainer float-left" style="padding-left:10px">
                                                    </div>        
                                                    </div>
                                                        <div>
                                                            <div id="result1" class="modal-kontainer float-right" style="padding-left:10px">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer mt-3 float-right">
                                                    <button id="btn" type="button" class="btn btn-sm btn-secondary " data-toggle="tooltip" data-placement="top" title="Capture">
                                                        <i class="fas fa-camera"></i>
                                                        CEKREK
                                                    </button>
                                                    <button id="simpanfoto" type="button" class="btn btn-sm btn-primary " data-dismiss="modal">
                                                        <i class="fas fa-save mr-2"></i>
                                                        SIMPAN
                                                    </button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                              {{-- End of Modal Ambil Foto --}}
                              <div id="result2">
                                
                              </div>
                              <input type="text" id="imagecam" name="imagecam">
                              {{-- <a id="myBtn" class="btn btn-default bg-maroon">Ambil Gambar</a> --}}
                              <input type="button" class="btn btn-primary" value="Ambil Foto" data-toggle="modal" data-target="#modal-ambil-foto">
                              <br><input type="submit" class="btn btn-success" value="Simpan">
                              <a href="data_customer" class="btn btn-default">Kembali</a>
                            </form>
                              {{-- <div>
                                <canvas id= "output"></canvas>
                              </div> --}}
                              
                              {{-- <button type="submit" class="btn btn-success">Simpan</button> --}}
                              {{-- <input type="button" class="btn btn-warning" id="tombolupload" value="Upload"> --}}
                              {{-- <input type="submit" class="btn btn-primary" value="Submit">
                              <a href="data_customer" class="btn btn-default">Cancel</a><br> --}}
                              {{-- <br><input class="btn btn-default" value="Snapshot" id="capture"> --}}
                            
                            
                            {{-- <div><video id= "preview"></video></div>
                              <div><button class="btn btn-primary mr-1" id= "capture">snapshot</button></div>
                              <!-- <button id= "capture">snapshot</button> -->
                              <canvas id= "output"></canvas>
                              <script>
                              const [preview, output,capture] = [
                                document.getElementById('preview'),
                                document.getElementById('output'),
                                document.getElementById('capture'),
                              ]
                              navigator.mediaDevices.getUserMedia({
                                audio: false,
                                video: {
                                  width: 400,
                                  height: 200
                                }
                              })
                              .then(stream => {
                                preview.srcObject = stream;
                                preview.play();
                              })
                              .catch(error => {
                                console.error(error);
                              })
                              capture.addEventListener('click', () => {
                                const context = output.getContext('2d');
                                output.width = 400;
                                output.height= 200;
                                context.drawImage(preview, 0, 0, output.width, output.height);
                                var img = canvas.toDataURL("image/png");
			                          alert("done");
                              });
                              </script> --}}
                          </div>
                        </div>
                    </div>   
                    <!-- /.card-body -->
                    <div class="card-footer">
                        
                    </div>
                    <!-- /.card-footer-->
                </div>
            </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
    </div>
</div>    
<!-- /.content-wrapper -->
@endsection

@section('script')
<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
  
<script type="text/javascript">
$(document).ready(function(){
 
  $("#provinsi-dd").change(function(){
    var prov_id=$("#provinsi-dd").val();
    $.ajax({
      type:"get",
      url:"findKota",
      data:"prov_id="+prov_id,
      success:function(data){
        $('#kota-dd').html('');
        $('#kecamatan-dd').html('');
        $('#kelurahandd').html('');
        $('#kodepos-dd').html('');
        $('#kota-dd').append('<option value="">Nama Kota</option>');
        $('#kecamatan-dd').append('<option value="">Nama Provinsi</option>');
        $('#kelurahandd').append('<option value="">Nama Kelurahan</option>');
        $('#kodepos-dd').append('<option value="">Kodepos</option>');
        for(var i=0;i<data.length;i++){
          $('#kota-dd').append('<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>');
        } 
      }
      });
  });

  $("#kota-dd").change(function(){
    var kota_id=$("#kota-dd").val();
    $.ajax({
      type:"get",
      url:"findKecamatan",
      data:"kota_id="+kota_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kecamatan-dd').append('<option value="'+data[i].id_kecamatan+'">'+data[i].nama_kecamatan+'</option>');
        } 
      }
      });
  });

  $("#kecamatan-dd").change(function(){
    var kec_id=$("#kecamatan-dd").val();
    $.ajax({
      type:"get",
      url:"findKelurahan",
      data:"kec_id="+kec_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kelurahandd').append('<option value="'+data[i].id_kelurahan+'">'+data[i].nama_kelurahan+'</option>');
        } 
      }
      });
  });

  $("#kelurahandd").change(function(){
    var kel_id=$("#kelurahandd").val();
    $.ajax({
      type:"get",
      url:"findKodepos",
      data:"kel_id="+kel_id,
      success:function(data){
        for(var i=0;i<data.length;i++){
          $('#kodepos-dd').append('<option value="'+data[i].id_kelurahan+'">'+data[i].kodepos+'</option>');
        } 
      }
      });
  });
  Webcam.set({
    width: 320,
    height: 240,
    image_format: 'png',
    png_quality: 100
  });
  Webcam.attach('#my_camera'); 
    function take_picture() {
        Webcam.snap(function(data_url) {
        $('#imagecam').val(data_url);

        document.getElementById('result1').innerHTML = '<img src="' + data_url +'"/>';
        document.getElementById('result2').innerHTML = '<img src="' + data_url +'"/>';
        });
    }
    document.getElementById('btn').addEventListener('click', take_picture);
});
</script>
@endsection
</html>

{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script type="text/javascript">
	$(document).ready(function(){

		$(document).ready(function () {
    $('#provinsi').on('change',function(e) {
    var prov_id = e.target.value;
    // var op=" ";

			$.ajax({
				type:'post',
				url:'{!!URL::to('findKota')!!}',
				data:{'id':prov_id},
				success:function(data){
					//console.log('success');

					//console.log(data);

					//console.log(data.length);
					// op+='<option value="0" selected disabled> - Pilih Kota - </option>';
					for(var i=0;i<data.length;i++){
					  // op+='<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>';
            $('#kota').append('<option value="'+data[i].id_kota+'">'+data[i].nama_kota+'</option>');
          }

				  //  $('#kota').html(" ");
				  //  $('#kota').append(op);
				},
				error:function(){

				}
			});
		});

		// $(document).on('change','.productname',function () {
		// 	var prod_id=$(this).val();

		// 	var a=$(this).parent();
		// 	console.log(prod_id);
		// 	var op="";
		// 	$.ajax({
		// 		type:'get',
		// 		url:'{!!URL::to('findPrice')!!}',
		// 		data:{'id':prod_id},
		// 		dataType:'json',//return data will be json
		// 		success:function(data){
		// 			console.log("price");
		// 			console.log(data.price);

		// 			// here price is coloumn name in products table data.coln name

		// 			a.find('.prod_price').val(data.price);

		// 		},
		// 		error:function(){

		// 		}
		// 	});


		// });

	});
</script> --}}

{{-- <script type="text/javascript">
  $(document).ready(function () {
    $('#provinsi').on('change',function(e) {
    var prov_id = e.target.value;
    var op=" ";

      $.ajax({
        url:"{!!URL::to('tambah_customer')!!}",
        type:"POST",
        data: {
          id: cat_id
        },
        success:function (data) {
          $('#kota').empty();
          $.each(data.data[0].data,function(list,subcategory){
            $('#subcategory').append('<option value="'+subcategory.id_kota+'">'+subcategory.nama_kota+'</option>');
          })
        }
      })
    });
  });
</script> --}}