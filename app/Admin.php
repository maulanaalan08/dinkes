<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    protected $primaryKey = "id";
    protected $fillable = [
        'berita_id',
        'user'
    ];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class, 'berita_id', 'id_berita');
    }
}
