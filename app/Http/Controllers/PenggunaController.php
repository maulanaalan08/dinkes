<?php

namespace App\Http\Controllers;

use App\User;
use App\Layanan;
use App\Puskesmas;
use App\Berita;
use App\Beranda;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenggunaController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 'active')->paginate(5);
        $beranda = Beranda::where('status', 'active')->paginate(5);
        return view('p.index', compact('layanan', 'beranda'));
    }
    public function profile()
    {
        return view('p.profile');
    }
    public function berita(Request $request)
    {
        $query = Berita::where('status', 'active');

        if ($request->has('jenis_berita') && $request->jenis_berita !== '') {
            $query->where('jenis_berita', $request->jenis_berita);
        }

        $berita = $query->paginate(3);

        return view('p.berita', compact('berita'));
    }

    public function kontak()
    {
        return view('p.kontak');
    }
    public function upt()
    {
        $puskesmas = Puskesmas::where('status', 'active')->paginate(5);
        return view('p.upt', compact('puskesmas'));
    }
    public function cek_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $cekLogin = user::where('username', $username)->where('password', $password)->first();

        if ($cekLogin) {
            return route('user.layanan');
        }
    }

    public function beritaDetail($id)
    {
        $berita = Berita::findOrFail($id);
        return view('p.berita-detail', compact('berita'));
    }
}
