<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kabkot extends Model
{
    protected $table = 'tbl_kabkot';
    
    // protected $primaryKey = 'id_kota';
    // public $incrementing = true;
    // public $timestamps = true;

    // protected $fillable = [
    //     'id_kota',
    //     'id_provinsi',
    //     'nama_kota',
    //     'ibukota',
    //     'k_bsni'
    // ];
    
    // public function Data()
    // {
    //     return $this->hasMany(DataCust::class, 'id_kota');
    // }

    // public function Provinsi()
    // {
    //     return $this->belongsTo(Provinsi::class, 'id_provinsi');
    // }
}
