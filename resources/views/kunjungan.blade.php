@extends('layouts/main')

<!doctype html>
<html lang="en">

@section('css_custom')
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="ZXing for JS">
    <zxing-scanner [tryHarder]="true" [formats]="formats" (scanSuccess)="onScanSuccessHandler($event)"></zxing-scanner>
@endsection

@section('content')
<div class="content-wrapper">
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
          <div class="col-sm-6">
              <h1 class="m-0">Kunjungan</h1>
          </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->  
  <section class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-6 col-lg-6">    
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Scan Kunjungan Disini</h3>
            </div><!-- /.card-header -->
            <section class="container" id="demo-content">
              <br>
              <div>
                  <button class="btn btn-primary" id="startButton">Start</button>
                  <button class="btn btn-secondary" id="resetButton">Reset</button>
              </div>
              <br>
              <div>
                  <video id="video" width="300" height="200" style="border: 1px solid gray"></video>
              </div>
          
              <div id="sourceSelectPanel" style="display:none">
                  <label for="sourceSelect"></label>
                  <select id="sourceSelect" style="max-width:400px" disabled><select>
              </div>
          
              <label>Result:</label>
              <code class="form-control" style="width:400px" name="result" id="result"></code><br>
            </section>
          </div><!-- /.card -->
        </div><!-- /.col-12 col-md col-lg-6 -->
        <div class="col-12 col-md-6 col-lg-6">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Toko</h3>
            </div>
            <div class="container" id="demo-content">
              <br><input type="button" class="btn btn-primary" id="tokodd" name="tokodd" value="Get Details"><br>
              <div class="row">
                  <div class="form-group col-6 col-md-6 col-lg-6">
                  <label>Nama Toko</label>
                  <p type="text" class="form-control"  name="nama" id="nama"></p><br>
                  </div>
                  <div class="form-group col-6 col-md-6 col-lg-6">
                  <label>Latitude</label>
                  <p type="text" class="form-control"  name="latitude" id="latitude"></p><br>
                  </div>
              </div>
              <div class="row">
                  <div class="form-group col-6 col-md-6 col-lg-6">
                  <label>Longitude</label>
                  <p type="text" class="form-control"  name="longitude" id="longitude"></p><br>
                  </div>
                  <div class="form-group col-6 col-md-6 col-lg-6">
                  <label>Accuracy</label>
                  <p type="text" class="form-control"  name="accuracy" id="accuracy"></p><br>
                  </div>
              </div>
            </div>
          </div><!-- /.card -->
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lokasi Anda Saat Ini</h3>
            </div>
            <div class="container" id="demo-content"><br>
              <div>
              <label>Latitude</label>
              <p type="text" class="form-control"  name="latitude2" id="latitude2"></p><br>
              </div>
              <div>
              <label>Longitude</label>
              <p type="text" class="form-control"  name="longitude2" id="longitude2"></p><br>
              </div>
              <div>
              <label>Accuracy</label>
              <p type="text" class="form-control"  name="accuracy2" id="accuracy2"></p><br>
              </div>
              {{-- <p id="demo"></p>
              <div class="card-footer">
                  <!-- <button type="button" class="btn btn-secondary" onclick="getLocation();">Get Location Now</button> -->
                  <button type="button" class="btn btn-primary" onclick="konfirmasi()">Submit</button>
              </div> --}}
              <div class="form-actions form-group">
                <div class="row">
                    <div class="col col-md-12" align="center">
                      <button type="button" class="btn btn-success " onclick="getLocation(); konfirmasi()">Ambil Lokasi</button>
                      <!-- <button type="button" class="btn btn-success btn-sm" onclick="konfirmasi()">Konfirmasi</button> -->
                    </div>
                </div>
              </div>
            </div>
          </div><!-- /.card -->
        </div><!-- /.col-12 col-md col-lg-6 -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->    
    <footer class="footer">
    <div class="container">
    </div>
    </footer>
  </section><!-- /.wrapper -->
</div><!-- /.content-wrapper -->
@endsection

<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.17.custom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- GET ZXING -->
<script type="text/javascript" src="https://unpkg.com/@zxing/library@0.18.3-dev.7656630/umd/index.js "></script>

<!-- AJAX GET DETAILS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

@section('script')
<script type="text/javascript">
  window.addEventListener('load', function () {
    let selectedDeviceId;
    const codeReader = new ZXing.BrowserMultiFormatReader()
    console.log('ZXing code reader initialized')
    codeReader.listVideoInputDevices()
      .then((videoInputDevices) => {
        const sourceSelect = document.getElementById('sourceSelect')
        selectedDeviceId = videoInputDevices[0].deviceId
        if (videoInputDevices.length >= 1) {
          videoInputDevices.forEach((element) => {
            const sourceOption = document.createElement('option')
            sourceOption.text = element.label
            sourceOption.value = element.deviceId
            sourceSelect.appendChild(sourceOption)
          })

          sourceSelect.onchange = () => {
            selectedDeviceId = sourceSelect.value;
          };

          const sourceSelectPanel = document.getElementById('sourceSelectPanel')
          sourceSelectPanel.style.display = 'block'
        }

        document.getElementById('startButton').addEventListener('click', () => {
          codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
            if (result) {
              console.log(result)
              document.getElementById('result').textContent = result.text
            }
            if (err && !(err instanceof ZXing.NotFoundException)) {
              console.error(err)
              document.getElementById('result').textContent = err
            }
          })
          console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
        })

        document.getElementById('resetButton').addEventListener('click', () => {
          codeReader.reset()
          document.getElementById('result').textContent = '';
          console.log('Reset.')
        })

      })
      .catch((err) => {
        console.error(err)
      })
  })


  $("#tokodd").click(function(){
    var scan_id = document.querySelector('code').innerText; // find <code> tag and get text
    // var scan_id = console.log(val);
    // element.innerText = console.log(val);
    $.ajax({
      type:"get",
      url:"findToko",
      data:"scan_id="+scan_id,
      success:function(data){
        //console.log(scan_id);
        for(var i=0;i<data.length;i++){
          // $('#ket').append('<label value="'+data[i].id_barang+'">'+data[i].ny
          document.getElementById("nama").innerHTML = data[i].nama_toko;
          document.getElementById("latitude").innerHTML = data[i].latitude;
          document.getElementById("longitude").innerHTML = data[i].longitude;
          document.getElementById("accuracy").innerHTML = data[i].accuracy;
        }
      }
    });
  });
   
  var lat = document.getElementById("latitude2");
  var long = document.getElementById("longitude2");
  var acc = document.getElementById("accuracy2");

  function getLocation() {
    if (navigator.geolocation) {
      navigator.geolocation.watchPosition(showPosition);
    } 
    else { 
      lat.innerHTML = "Geolocation is not supported by this browser.";
      long.innerHTML = "Geolocation is not supported by this browser.";
      acc.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
      
  function showPosition(position) {
      lat.innerHTML=position.coords.latitude;
      long.innerHTML=position.coords.longitude;
      acc.innerHTML=position.coords.accuracy;
  }

  function getDistanceFromLatLonInKm(lat,long,lat2,long2) {   
    var R = 6371; // Radius of the earth in km   
    var dLat = deg2rad(lat2-lat);  // deg2rad below   
    var dLon = deg2rad(long2-long);    
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(deg2rad(lat)) * Math.cos(deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2);    
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));    
    var d = R * c; // Distance in km 
    return d; 
  } 
  
  function deg2rad(deg) {   
    return deg * (Math.PI/180) 
  } 

  function konfirmasi(){
    var lat = document.getElementById("latitude").innerHTML;
    var long = document.getElementById("longitude").innerHTML;
    var ac = Number(document.getElementById("accuracy").innerHTML);
    var lat2 = document.getElementById("latitude2").innerHTML;
    var long2 = document.getElementById("longitude2").innerHTML;
    var acc2 = Number(document.getElementById("accuracy2").innerHTML);
    var jarak = Number(getDistanceFromLatLonInKm(latitude,longitude,latitude2,longitude2)*1000);
    console.log(jarak);
    var rataAccuracy = Number((accuracy+accuracy2)/2);
    console.log(rataAccuracy);
    if (jarak <= rataAccuracy)
      window.alert("Anda berada diarea toko");
    else
      window.alert("Anda tidak berada diarea toko");
  }


</script>
@endsection
</html> 

