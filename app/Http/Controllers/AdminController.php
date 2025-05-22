<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\Puskesmas;
use App\Berita;
use App\Beranda;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $layanan = Layanan::where('status', 'active')->paginate(10);
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
        $puskesmas = Puskesmas::where('status', 'active')->paginate(10);
        return view('user.puskesmas', compact('puskesmas'));
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
        $berita = Berita::where('status', 'active')->paginate(10);
        return view('user.berita', compact('berita'));
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
        $beranda = Beranda::where('status', 'active')->paginate(10);
        return view('user.beranda', compact('beranda'));
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

}
