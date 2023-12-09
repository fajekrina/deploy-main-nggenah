<!DOCTYPE html>
<html> 
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
 <title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body> 
 <table class="table table-bordered" style="text-align: center">   
  <tbody>
            <tr>
            @foreach($barang as $data)
                <td><?php 
                    $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
                    echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($data->id_barang, $generator::TYPE_CODE_128, $widthFactor = 1.5, $height = 20)) . '">';?>
                    <br>
                    <?= $data->id_barang?>
                    <br>
                    <?= $data->nama?>
                </td>
                @if($no++ %10 == 0)
                    </tr><tr>
                @endif    
            @endforeach
  </tbody>
 </table>


</body>
</html>