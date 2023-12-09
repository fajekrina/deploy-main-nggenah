<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\DataCust;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kabkot;
use App\Models\Provinsi;

class DataCustController extends Controller
{
    public function list()
    {
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $kodepos = Kelurahan::all();

        // return view('tambah_customer', [
        //     'provinsi' => $id_provinsi,
        //     'kota' => $id_kota,
        //     'kecamatan' => $id_kecamatan,
        //     'kelurahan' => $id_kelurahan,
        //     'kodepos' => $kodepos
        // ]);

        return view('tambah_customer', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'kodepos'));
    }

    public function list2()
    {
        $provinsi = Provinsi::all();
        $kota = Kabkot::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $kodepos = Kelurahan::all();

        // return view('tambah_customer', [
        //     'provinsi' => $id_provinsi,
        //     'kota' => $id_kota,
        //     'kecamatan' => $id_kecamatan,
        //     'kelurahan' => $id_kelurahan,
        //     'kodepos' => $kodepos
        // ]);

        return view('tambahcustomer', compact('provinsi', 'kota', 'kecamatan', 'kelurahan', 'kodepos'));
    }

    // public function insertCustomer(Request $post){
    //     DB::table('customer')->insert([
    //         'id_customer' => $post->id_customer,
    //         'nama' => $post->nama,
    //         'alamat' => $post->alamat,
    //         // 'foto' => $post->foto,
    //         // 'file_path' => $post->file_path,
    //         'id_kelurahan' => $post->id_kelurahan
    //     ]);

    //     return redirect('/insertCustomer', $post);
    // }

    public function findKota(Request $request)
    {
        $data = Kabkot::select('id_kota', 'nama_kota')
        ->where('id_provinsi',$request->prov_id)
        ->get();
        return response()->json($data); 
    }

    public function findKecamatan(Request $request)
    {
        $data = Kecamatan::select('id_kecamatan', 'nama_kecamatan')
        ->where('id_kota',$request->kota_id)
        ->get();
        return response()->json($data);
    }

    public function findKelurahan(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'nama_kelurahan')
        ->where('id_kecamatan',$request->kec_id)
        ->get();
        return response()->json($data);
    }

    public function findKodepos(Request $request)
    {
        $data = Kelurahan::select('id_kelurahan', 'kodepos')
        ->where('id_kelurahan',$request->kel_id)
        ->get();
        return response()->json($data);
    }

}
