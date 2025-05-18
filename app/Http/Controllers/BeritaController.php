<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Berita;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $berita = Berita::paginate(5);
        return view('user.berita', compact('berita'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.add-berita');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
