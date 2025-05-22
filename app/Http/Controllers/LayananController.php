<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use App\Layanan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        // dd($usrLogin->role);
        $layanan = Layanan::paginate(5);
        return view('user.layanan', compact('layanan', 'role'));
    }


    public function create()
    {
        return view('user.add-layanan');
    }

    public function store(Request $request)
    {
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

    public function edit($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('user.edit-layanan', compact('layanan'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'detail' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $layanan = Layanan::find($id);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($layanan->gambar && file_exists(public_path('uploads/' . $layanan->gambar))) {
                unlink(public_path('uploads/' . $layanan->gambar));
            }

            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $gambarFileName);
            $layanan->gambar = $gambarFileName;
        }


        $layanan->judul = $request->judul;
        $layanan->detail = $request->detail;
        $layanan->save();

        return redirect()->route('user.layanan')->with('success', 'Data berhasil diperbarui');
    }


    public function destroy($id)
    {
        // dd($id_layanan);
        $layanan = Layanan::find($id);
        if ($layanan) {
            $layanan->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
}
