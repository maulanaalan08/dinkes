<?php

namespace App\Http\Controllers;

use App\Pengguna;
use App\User;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    public function index()
    {
        return view('p.index');
    }
    public function cek_login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $cekLogin = user::where('username', $username)->where('password', $password)->first();
        
        if ($cekLogin) {
            return route('user.layanan');
        }
    }
}