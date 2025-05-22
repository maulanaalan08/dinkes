<?php

namespace App\Http\Controllers;

use App\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $beranda = Beranda::paginate(5);
        return view('user.beranda', compact('beranda', 'role'));
    }

    public function create()
    {
        $role = Auth::user()->role;
        $beranda = Beranda::all();
        return view('user.add-beranda', compact('beranda', 'role'));
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
            $file->move(public_path('beranda'), $gambarFileName);
        }

        // Simpan data
        Beranda::create([
            'judul'   => $request->judul,
            'detail'  => $request->detail,
            'status'  => 'nonActive',
            'gambar'  => $gambarFileName,
        ]);

        return redirect()->route('beranda.index')->with('success', 'Data berhasil disimpan.');
    }

    public function edit($id)
    {
        $role = Auth::user()->role;
        $beranda = Beranda::findOrFail($id);
        return view('user.edit-beranda', compact('beranda', 'role'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required|string|max:255',
            'detail' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $beranda = Beranda::find($id);

        // Proses upload gambar jika ada file baru
        if ($request->hasFile('gambar')) {
            // hapus gambar lama jika ada
            if ($beranda->gambar && file_exists(public_path('beranda/' . $beranda->gambar))) {
                unlink(public_path('beranda/' . $beranda->gambar));
            }

            $file = $request->file('gambar');
            $gambarFileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('beranda'), $gambarFileName);
            $beranda->gambar = $gambarFileName;
        }


        $beranda->judul = $request->judul;
        $beranda->detail = $request->detail;
        $beranda->save();

        return redirect()->route('beranda.index')->with('success', 'Data berhasil diperbarui');
    }

    public function destroy($id)
    {
        $beranda = Beranda::find($id);
        if ($beranda) {
            $beranda->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
}
