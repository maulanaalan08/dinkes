<?php

namespace App\Http\Controllers;
use App\Models\Pengguna;
use App\Layanan;

use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanan = Layanan::paginate(5);
        return view('user.layanan', compact('layanan'));
    }


    public function create()
    {
        return view('user.add-layanan');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $this->validate($request, [
            'judul'   => 'required|string|max:255',
            'detail'  => 'required|string|max:255',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarFileName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $gambarFileName);
        }

        // Simpan data
        Layanan::create([
            'judul'   => $request->judul,
            'detail'  => $request->detail,
            'gambar'  => $gambarFileName,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('user.layanan')->with('success', 'Data berhasil disimpan.');
    }
}
