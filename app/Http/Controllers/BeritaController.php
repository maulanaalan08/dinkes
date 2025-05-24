<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $berita = Berita::paginate(5);
        return view('user.berita', compact('berita', 'role'));
    }

    public function create()
    {
        $role = Auth::user()->role;
        $berita = Berita::all();
        return view('user.add-berita', compact('berita', 'role'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'judul'   => 'required|string|max:255',
            'detail'  => 'required|string|max:255',
            'jenis_berita'  => 'required|string|max:255',
            'tanggal'  => 'required|date',
            'gambar'  => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarFileName = null;
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('berita'), $gambarFileName);
        }

        // Simpan data
        Berita::create([
            'judul'   => $request->judul,
            'detail'  => $request->detail,
            'jenis_berita'  => $request->jenis_berita,
            'tanggal'  => $request->tanggal,
            'gambar'  => $gambarFileName,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('berita.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $role = Auth::user()->role;
        $berita = Berita::findOrFail($id);
        return view('user.edit-berita', compact('berita', 'role'));
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'detail' => 'required|string',
            'jenis_berita' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $berita = Berita::find($id);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($berita->gambar && file_exists(public_path('berita/' . $berita->gambar))) {
                unlink(public_path('berita/' . $berita->gambar));
            }

            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('berita'), $gambarFileName);
            $berita->gambar = $gambarFileName;
        }


        $berita->judul = $request->judul;
        $berita->detail = $request->detail;
        $berita->jenis_berita = $request->jenis_berita;
        $berita->save();

        return redirect()->route('berita.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $berita = Berita::find($id);
        if ($berita) {
            $berita->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
}
