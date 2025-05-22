<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Puskesmas;
use Illuminate\Support\Facades\Auth;

class PuskesmasController extends Controller
{
    public function index()
    {
        $role = auth()->user();
        $puskesmas = Puskesmas::paginate(5);
        return view('user.puskesmas', compact('puskesmas', 'role'));
    }

    public function create()
    {
        $role = auth()->user();
        $puskesmas = Puskesmas::all();
        return view('user.add-puskesmas', compact('puskesmas', 'role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'   => 'required|string|max:255',
            'kepala_puskesmas'  => 'required|string|max:255',
            'alamat'   => 'required|string|max:255',
            'no_telp'   => 'required|string|max:255',
        ]);


        // Simpan data
        Puskesmas::create([
            'nama'   => $request->nama,
            'kepala_puskesmas'  => $request->kepala_puskesmas,
            'alamat'   => $request->alamat,
            'no_telp'   => $request->no_telp,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('puskesmas.index')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        $puskesmas = Puskesmas::find($id);
        if ($puskesmas) {
            $puskesmas->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }

    public function edit($id)
    {
        $role = auth()->user();
        $puskesmas = Puskesmas::findOrFail($id);
        return view('user.edit-puskesmas', compact('puskesmas', 'role'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama'   => 'required|string|max:255',
            'kepala_puskesmas'  => 'required|string|max:255',
            'alamat'   => 'required|string|max:255',
            'no_telp'   => 'required|string|max:255',
        ]);

        $puskesmas = Puskesmas::find($id);

        $puskesmas->nama = $request->nama;
        $puskesmas->kepala_puskesmas = $request->kepala_puskesmas;
        $puskesmas->alamat = $request->alamat;
        $puskesmas->no_telp = $request->no_telp;
        $puskesmas->save();

        return redirect()->route('puskesmas.index')->with('success', 'Data berhasil diperbarui');
    }
}
