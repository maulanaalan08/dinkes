<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\Puskesmas;
use App\Berita;
use App\Beranda;
use App\Kecamatan;
use App\Kelurahan;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $layanan = Layanan::paginate(5);
        return view('user.layanan', compact('layanan', 'role'));
    }

    public function aprove($id)
    {
        $layanan = Layanan::find($id);
        if ($layanan->status === 'active') {
            $layanan->status = 'nonActive';
        } else {
            $layanan->status = 'active';
        }

        $layanan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }

    public function puskesmas()
    {
        $role = Auth::user()->role;
        $puskesmas = Puskesmas::paginate(5);
        return view('user.puskesmas', compact('puskesmas', 'role'));
    }

    public function setuju($id)
    {
        $puskesmas = Puskesmas::find($id);
        if ($puskesmas->status === 'active') {
            $puskesmas->status = 'nonActive';
        } else {
            $puskesmas->status = 'active';
        }

        $puskesmas->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }

    public function berita()
    {
        $role = Auth::user()->role;
        $berita = Berita::paginate(5);
        return view('user.berita', compact('berita', 'role'));
    }

    public function aproveBerita($id)
    {
        $berita = Berita::find($id);
        if ($berita->status === 'active') {
            $berita->status = 'nonActive';
        } else {
            $berita->status = 'active';
        }

        $berita->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }

    public function beranda()
    {
        $role = Auth::user()->role;
        $beranda = Beranda::paginate(5);
        return view('user.beranda', compact('beranda', 'role'));
    }

    public function aproveBeranda($id)
    {
        $beranda = Beranda::find($id);
        if ($beranda->status === 'active') {
            $beranda->status = 'nonActive';
        } else {
            $beranda->status = 'active';
        }

        $beranda->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
    
    public function kecamatan()
    {
        $role = Auth::user()->role;
        $beranda = Beranda::paginate(5);
        return view('user.kecamatan', compact('kecamatan', 'role'));
    }

    public function aprovekecamatan($id)
    {
        $kecamatan = Kecamatan::find($id);
        if ($kecamatan->status === 'active') {
            $kecamatan->status = 'nonActive';
        } else {
            $kecamatan->status = 'active';
        }

        $kecamatan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
    
    public function kelurahan()
    {
        $role = Auth::user()->role;
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        foreach( $kelurahan as $k ){
            foreach( $kecamatan as $kec ){
                if($k->id_kecamatan == $kec->id){
                    $k->id_kecamatan = $kec->nama;
                }
            }
        }
        return view('user.kelurahan', compact('kecamatan','kelurahan', 'role'));
    }

    public function aprovekelurahan($id)
    {
        $kelurahan = Kelurahan::find($id);
        if ($kelurahan->status === 'active') {
            $kelurahan->status = 'nonActive';
        } else {
            $kelurahan->status = 'active';
        }

        $kelurahan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
}
