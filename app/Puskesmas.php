<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    protected $table = "data_puskesmas";
    protected $primaryKey = "id_data_puskesmas";
    protected $fillable = [
        'nama',
        'kepala_puskesmas',
        'alamat',
        'no_telp',
        'status',
    ];
}

