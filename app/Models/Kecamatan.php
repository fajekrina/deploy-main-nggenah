<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'tbl_kecamatan';
    
    // protected $primaryKey = 'id_kecamatan';
    // public $incrementing = true;
    // public $timestamps = true;

    // protected $fillable = [
    //     'id_kecamatan',
    //     'id_kota',
    //     'nama_kecamatan'
    // ];

    // public function Data()
    // {
    //     return $this->hasMany(DataCust::class, 'id_kecamatan');
    // }
}
