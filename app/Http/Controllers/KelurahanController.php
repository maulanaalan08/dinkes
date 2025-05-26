<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelurahan;
use App\Kecamatan;
use Illuminate\Support\Facades\Auth;

class KelurahanController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        // dd($usrLogin->role);
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        foreach( $kelurahan as $k ){
            foreach( $kecamatan as $kec ){
                if($k->id_kecamatan == $kec->id){
                    $k->id_kecamatan = $kec->nama;
                }
            }
        }
        return view('user.kelurahan', compact('kecamatan', 'kelurahan', 'role', 'namaKecamatan'));
    }
    public function create()
    {
        $role = Auth::user()->role;
        $kecamatan = Kecamatan::all();
        return view('user.add-kelurahan', compact('kecamatan', 'role'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'id_kecamatan'   => 'required|max:255',
            'nama'   => 'required|string|max:255',
            'status'  => 'nonActive',
        ]);

        Kelurahan::create([
            'id_kecamatan'   => $request->id_kecamatan,
            'nama'   => $request->nama,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('kelurahan.index')->with('success', 'Data berhasil disimpan.');
    }
}
