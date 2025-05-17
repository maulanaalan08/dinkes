<?php

namespace App\Http\Controllers;

use App\Pengguna;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    // Tampilkan form untuk menambahkan data baru
    public function index()
    {
        $pengguna = Pengguna::all();
        return view('p.index', compact('pengguna'));
    }

}
