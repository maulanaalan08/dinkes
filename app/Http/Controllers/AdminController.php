<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Layanan;

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
}
