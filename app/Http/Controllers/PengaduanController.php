<?php

namespace App\Http\Controllers;

use App\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pengguna;

class PengaduanController extends Controller
{
    public function index()
    {
        $role = Auth::user()->role;
        $pengaduan = Pengaduan::all();
        return view('user.pengaduan', compact('pengaduan', 'role'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'   => 'required|string|max:255',
            'no_telp'  => 'required|min:11',
            'pesan'  => 'required',
        ]);

        // Simpan data
        Pengaduan::create([
            'nama'   => $request->nama,
            'no_telp'  => $request->no_telp,
            'pesan'  => $request->pesan,
            'status'  => 'nonActive',
        ]);

        return redirect()->route('kontak')->with('success', 'Data berhasil disimpan.');
    }

    public function destroy($id)
    {
        // dd($id_layanan);
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan) {
            $pengaduan->delete();
            return redirect()->back()->with('success', 'Berhasil dihapus');
        }
        return redirect()->back()->with('error', 'Data tidak ditemukan');
    }
    
    public function aproveBerita($id)
    {
        $pengaduan = Pengaduan::find($id);
        if ($pengaduan->status === 'active') {
            $pengaduan->status = 'nonActive';
        } else {
            $pengaduan->status = 'active';
        }

        $pengaduan->save();

        return redirect()->back()->with('success', 'Status berhasil diubah.');
    }
}
