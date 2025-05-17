<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = "pengguna";
    protected $primaryKey = "id_berita";
    protected $fillable = [
        'beranda',
        'artikel',
        'judul',
        'detail',
        'nama',
        'status',
    ];

    public function admin()
    {
        return $this->hasMany(Admin::class, 'berita_id', 'id_berita');
    }
}
