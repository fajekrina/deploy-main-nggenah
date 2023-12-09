<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataCust extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    public $incrementing = true;
    // public $timestamps = false;

    protected $fillable = [
        'nama',
        'alamat',
        'id_kelurahan'
    ];

    // $datacust = DataCust::insert([
    //     'id_customer' => null,
    //     'nama' => null,
    //     'alamat' => null,
    //     'id_kelurahan' => $request->id_kecamatan
    // ]);

    // $status_berhasil = "Data Berhasil Ditambahkan!";

    // return redirect('/')->with($status_berhasil);

    // public function Kelurahan()
    // {
    //     return $this->belongsTo(Kelurahan::class, 'id_keluarahan');
    // }

    // public function Kota()
    // {
    //     return $this->belongsTo(Kabkot::class, 'id_kota');
    // }

    // public function Kecamatan()
    // {
    //     return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    // }

    // public function Provinsi()
    // {
    //     return $this->belongsTo(Provinsi::class, 'id_provinsi');
    // }
}
