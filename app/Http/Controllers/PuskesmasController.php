<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puskesmas;

class PuskesmasController extends Controller
{
    public function index()
    {
        $puskesmas = Puskesmas::paginate(5);
        return view('user.puskesmas', compact('puskesmas'));
    }

    public function create()
    {
        return view('user.add-puskesmas');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'tempat'   => 'required|string|max:255',
            'detail'  => 'required|string|max:255',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarFileName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('puskesmas'), $gambarFileName);
        }

        // Simpan data
        Puskesmas::create([
            'tempat'   => $request->tempat,
            'detail'  => $request->detail,
            'gambar'  => $gambarFileName,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('puskesmas.index')->with('success', 'Data berhasil disimpan.');
    }
}
