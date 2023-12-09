<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Models\DataCust;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use App\Models\Kabkot;
use App\Models\Provinsi;

class Customer extends Controller
{
    public function home(){
        $data = array(
            'menu' => 'home',
            'submenu' => ''
        );
        return view('home_admin', $data);
    }

    public function Customer(){
        $data = array(
            'menu' => 'customer',
            'submenu' => ''
        );
        return view('data_customer', $data);
    }

    public function indexCustomer(){
        $customer = DB::table('customer')
        ->join('tbl_kelurahan', 'tbl_kelurahan.id_kelurahan', '=', 'customer.id_kelurahan')
        ->get();
        $data = array(
            'menu' => 'customer',
            'submenu' => '',
            'customer' => $customer
        );
        return view('data_customer', $data);
    }

    public function insertCustomer(Request $post){
        // $img = $post->imagecam;
        // $img = str_replace('data:image/png;base64', '', $img);

        // $img = base64_decode($img);

        DB::table('customer')->insert([
            'id_customer' => $post->idcust,
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'foto' => $post->imagecam,
            // 'file_path' => $post->file_path,
            'id_kelurahan' => $post->kelurahandd
        ]);

        return redirect('/data_customer');

    }

    public function insertCustomer2(Request $post){
        $imagecam = str_replace('data:image/png;base64,', '', $post->imagecam);
        $imagecam = str_replace(' ', ' + ', $imagecam);
        $imageName = $post->nama. '.png';
        Storage::disk('local')->put($imageName, base64_decode($imagecam));
        
        DB::table('customer')->insert([
            'nama' => $post->nama,
            'alamat' => $post->alamat,
            'file_path' => $imageName,
            'id_kelurahan' => $post->kelurahandd
        ]);

        return redirect('/data_customer');

    }

    // public function tambahCustomer(){
    //     $provinsi = DB::table('tbl_provinsi')->get();
    //     $kota = DB::table('tbl_kabkot')->get();
    //     $kecamatan = DB::table('tbl_kecamatan')->get();
    //     $kelurahan = DB::table('tbl_kelurahan')->get();
    //     $kodepos = DB::table('tbl_kelurahan')->get();
    //     $data = array(
    //         'menu' => 'home',
    //         'submenu' => '',
    //         'provinsi' => $provinsi,
    //         'kota' => $kota,
    //         'kecamatan' => $kecamatan,
    //         'kelurahan' => $kelurahan,
    //         'kodepos' => $kodepos
    //     );

        
    //     return view('tambah_customer', $data);
    // }

    // public function insertCustomer(Request $post){
    //     DB::table('customer')->insert([
    //         'nama' => $post->nama,
    //         'alamat' => $post->alamat,
    //         'nama_provinsi' => $post->nama_provinsi,
    //         'nama_kota' => $post->nama_kota,
    //         'nama_kecamatan' => $post->nama_kecamatan,
    //         'nama_kelurahan' => $post->nama_kelurahan,
    //         'kodepos' => $post->kodepos,
    //         'foto' => $post->foto
    //     ]);

    //     return redirect('/data_customer', $data);
    // }


}
