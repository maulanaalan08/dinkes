<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = "berita";
    protected $primaryKey = "id_berita";
    protected $fillable = [
        'judul',
        'detail',
        'gambar',
        'tanggal',
        'jenis_berita',
        'status',
    ];

    
}
