<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    protected $table = "pengaduan";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama',
        'no_telp',
        'pesan',
        'status',
    ];
}
