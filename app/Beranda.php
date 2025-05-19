<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beranda extends Model
{
    protected $table = "beranda";
    protected $primaryKey = "id_beranda";
    protected $fillable = [
        'judul',
        'detail',
        'status',
        'gambar',
    ];


}
