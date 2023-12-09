<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Toko;
use PDF;

class TokoController extends Controller
{
    public function index()
    {
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'toko',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('data_toko', $data);
    }

    public function indexToko()
    {
        $toko = DB::table('lokasi_toko')->get();
        $data = array(
            'menu' => 'toko',
            'submenu' => 'toko',
            'toko' => $toko
        );
        return view('tambah_toko', $data);
    }

    public function insertToko(Request $post){
        DB::table('lokasi_toko')->insert([
            'nama_toko' => $post->nama_toko,
            'latitude' => $post->latitude,
            'longitude' => $post->longitude,
            'accuracy' => $post->accuracy
    ]);
    return redirect('/data_toko');
    }

    public function findToko(Request $request)
    {
        $data = Toko::select('barcode', 'nama_toko', 'latitude', 'longitude', 'accuracy')
        ->where('barcode',$request->scan_id)
        ->get();
        return response()->json($data);
    }

    public function cetak_toko()
    {
        $no = 1;
    	$toko = Tokoo::all();
        $data = array(
            'menu' => 'toko',
            'submenu' => '',
            'toko' => $toko,
            'no' => $no
            
        );
    	$pdf = PDF::loadview('printToko',compact('data', 'toko', 'no'));
        $pdf->setPaper('A4', 'landscape');
    	return $pdf->download('barcode-Toko-pdf.pdf');
    }
}
