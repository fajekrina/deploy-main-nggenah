<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Barang;
use PDF;


class BarangController extends Controller
{
    public function home(){
        $data = array(
            'menu' => 'home',
            'submenu' => ''
        );
        return view('home_admin', $data);
    }

    public function Barang()
    {
        $data = array(
            'menu' => 'barang',
            'submenu' => ''
        );
        return view('data_barang', $data);

    }

    // public function indexBarang()
    // {
    //     $barang = DB::table('barang')->get();
    //     $data = array(
    //         'menu' => 'barang',
    //         'submenu' => '',
    //         'barang' => $barang
    //     );
    //     return view('data_barang', $data);
    // }

    public function indexBarang()
    {
        $barang = DB::table('barang')->get();
        $barang2 = $barang;
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'barcode',
            'barang' => $barang,
            'barang2' => $barang2
        
        );
        return view('data_barang',$data);
    }  

    // public function indexBarang()
    // {
    //     $barang = Barang::all();
    //     $data = array(
    //         'menu' => 'barang',
    //         'submenu' => '',
    //         'barang' => $barang
    //     );
    //     return view('data_barang', $data);
    //     // return view('data_barang')->with('barang',$barang);
    //     // return view('data_barang', compact('barang'));
    // }

    // public function cetak_pdf(Request $request)
    // {
    // 	$no = 1;
    //     $barang = Barang::whereIn('id_barang',[$request->semua_id])->get();
    //     $data = array(
    //         'menu' => 'barang', 
    //         'submenu' => '',
    //         'no' => $no,
    //         'barang' => $barang
    //     );
    // 	$pdf = PDF::loadview('barang_pdf',compact('data', 'barang', 'no'))->setOptions(['defaultFont' => 'sans_serif'])->setPaper('A4', 'landscape');
    // 	return $pdf->download('laporan-barang-pdf');
    // }

    public function findBarang(Request $request)
    {
        $data = Barang::select('id_barang', 'nama')
        ->where('id_barang',$request->scan_id)
        ->get();
        return response()->json($data);
    }

    public function cetakPdf(Request $request)
    {   
        // $row= 1;
        // $col= 1;
        $row= $request->row1;
        $col= $request->col1;
        $panjang=(($row-1)*5)+($col-1);
        $no=1;
        $x=1;
        // $barang = D_barang::whereIn('id_barang',[$request->ids])->get();
        $barang = DB::table('barang')->get();
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'barcode',
            'barang' => $barang,
            'no' => $no,
            'row' => $row,
            'col' => $col,
            'x' => $x,
            'panjang' => $panjang 
        
        );
        $pdf = PDF::loadview('barang_pdf',compact('barang','data','no','col','row','x','panjang'))->setPaper('A5','potrait');
        // return $pdf->download('laporan-barang-pdf.pdf');
        return $pdf->stream();
    }

    public function cetakPdf1(Request $request)
    {   
        // $row= 1;
        // $col= 1;
        $row= $request->row;
        $col= $request->col;
        $panjang=(($row-1)*5)+($col-1);
        $no=1;
        $x=1;
        $barang = D_barang::whereIn('id_barang',$request->ids)->get();
        
        // $barang = DB::table('barang')->get();
        $data = array(
            'menu'=> 'barcode',
            'submenu'=>'barcode',
            'barang' => $barang,
            // 'barang1' => $barang1,
            'no' => $no,
            'row' => $row,
            'col' => $col,
            'x' => $x,
            'panjang' => $panjang
        
        );
        $pdf = PDF::loadview('barang_pdf',compact('barang','data','no','col','row','x','panjang'))->setPaper('A5','potrait');
        // return $pdf->download('laporan-barang-pdf.pdf');
        return $pdf->stream();
        // return $request;
    }

    public function cetakPdf2(Request $request){

        return $request;
    }

    // public function list()
    // {
    //     $barang = M_barang::all();
    //     // $kota = M_kabkot::all();
    //     // $kecamatan = M_kecamatan::all();
    //     // $kelurahan = M_kelurahan::all();
    //     // $kodepos = M_kelurahan::all();

    //     return view('barang', compact('barang'));
    // }

    // public function insertBarang(Request $post)
    // {
    //     DB::table('barang')->insert([
    //         'id_barang' => $post->idbrg,
    //         'nama' => $post->nama,
    //         'timestamp' => $post->timestamp,
    //     ]);

    //     return redirect('/Barang');
    // }
}
