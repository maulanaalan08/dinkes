<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;
use App\Puskesmas;

class AdminController extends Controller
{
    public function index()
    {
        $layanan = Layanan::where('status', 'active')->paginate(10);
        return view('user.layanan', compact('layanan'));
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


}
