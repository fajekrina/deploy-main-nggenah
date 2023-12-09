<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'tbl_provinsi';
    
    // protected $primaryKey = 'id_provinsi';
    // public $incrementing = true;
    // public $timestamps = true;

    // protected $fillable = [
    //     'id_provinsi',
    //     'nama_provinsi',
    //     'ibukota',
    //     'p_bsni'
    // ];
    
    // public function Data()
    // {
    //     return $this->hasMany(DataCust::class, 'id_provinsi');
    // }
    // public function Kota()
    // {
    //     return $this->hasMany(Kabkot::class, 'id_kota');
    // }
}
