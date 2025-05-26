<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use Illuminate\Support\Facades\Auth;

class KecamatanController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        // dd($usrLogin->role);
        $kecamatan = Kecamatan::all();
        return view('user.kecamatan', compact('kecamatan', 'kelurahan', 'role'));
    }

    public function create()
    {
        $role = Auth::user()->role;
        $kecamatan = Kecamatan::all();
        return view('user.add-kecamatan', compact('kecamatan', 'role'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'nama'   => 'required|string|max:255',
            'status'  => 'nonActive',
        ]);

        Kecamatan::create([
            'nama'   => $request->nama,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('kecamatan.index')->with('success', 'Data berhasil disimpan.');
    }
}
