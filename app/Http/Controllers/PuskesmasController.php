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
        $puskesmas = Puskesmas::findOrFail($id);
        return view('user.edit-puskesmas', compact('puskesmas'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tempat' => 'required|string|max:255',
            'detail' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $puskesmas = Puskesmas::find($id);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($puskesmas->gambar && file_exists(public_path('puskesmas/' . $puskesmas->gambar))) {
                unlink(public_path('puskesmas/' . $puskesmas->gambar));
            }

            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('puskesmas'), $gambarFileName);
            $puskesmas->gambar = $gambarFileName;
        }


        $puskesmas->tempat = $request->tempat;
        $puskesmas->detail = $request->detail;
        $puskesmas->save();

        return redirect()->route('puskesmas.index')->with('success', 'Data berhasil diperbarui');
    }
}
