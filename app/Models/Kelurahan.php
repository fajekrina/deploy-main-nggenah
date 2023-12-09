<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kelurahan extends Model
{
    protected $table = 'tbl_kelurahan';
    
    // protected $primaryKey = 'id_kelurahan';
    // public $incrementing = true;
    // public $timestamps = true;

    // protected $fillable = [
    //     'id_kelurahan',
    //     'id_kecamatan',
    //     'nama_kelurahan',
    //     'kodepos'
    // ];
    
    // public function Data()
    // {
    //     return $this->hasMany(DataCust::class, 'id_kelurahan');
    // }
}
