<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();
Route::get('/', 'PenggunaController@index')->name('index');
Route::get('/profile', 'PenggunaController@profile')->name('profile');
Route::get('/upt', 'PenggunaController@upt')->name('upt');
Route::get('/pengumuman', 'PenggunaController@berita')->name('berita');

Route::get('/berita/detail/{id}', 'PenggunaController@beritaDetail')->name('berita.detail');

Route::get('/kontak', 'PenggunaController@kontak')->name('kontak');
Route::get('/home', 'HomeController@index');
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
Route::get('/Login', 'Auth\LoginController@showLoginForm')->name('show');
Route::post('/Login', 'Auth\LoginController@login')->name('login');

//layanan
Route::get('/layanan', 'LayananController@index')->middleware(['auth', 'role:admin|user'])->name('user.layanan');
Route::get('/layanan/store', 'LayananController@create')->middleware(['auth', 'role:admin|user'])->name('layanan.store');
Route::post('/layanan/create', 'LayananController@store')->middleware(['auth', 'role:admin|user'])->name('layanan.create');
Route::delete('/layanan/delete{id}', 'LayananController@destroy')->middleware(['auth', 'role:admin|user'])->name('layanan.destroy');
Route::get('/layanan/edit/{id}', 'LayananController@edit')->middleware(['auth', 'role:admin|user'])->name('layanan.edit');
Route::put('/layanan/update/{id}', 'LayananController@update')->middleware(['auth', 'role:admin|user'])->name('layanan.update');
Route::get('/layanan/admin', 'AdminController@index')->middleware(['auth', 'role:admin'])->name('layanan.admin');
Route::post('/layanan/status/{id}', 'AdminController@aprove')->middleware(['auth', 'role:admin'])->name('layanan.aprove');

//Puskesmas
Route::get('/kesmas', 'PuskesmasController@index')->middleware(['auth', 'role:admin|user'])->name('puskesmas.index');
Route::get('/puskesmas/store', 'PuskesmasController@create')->middleware(['auth', 'role:admin|user'])->name('puskesmas.store');
Route::post('/puskesmas/create', 'PuskesmasController@store')->middleware(['auth', 'role:admin|user'])->name('puskesmas.create');
Route::delete('/puskesmas/delete{id}', 'PuskesmasController@destroy')->middleware(['auth', 'role:admin|user'])->name('puskesmas.destroy');
Route::get('/puskesmas/edit/{id}', 'PuskesmasController@edit')->middleware(['auth', 'role:admin|user'])->name('puskesmas.edit');
Route::put('/puskesmas/update/{id}', 'PuskesmasController@update')->middleware(['auth', 'role:admin|user'])->name('puskesmas.update');
Route::get('/puskesmas/admin', 'AdminController@puskesmas')->middleware(['auth', 'role:admin'])->name('puskesmas.admin');
Route::post('/puskesmas/status/{id}', 'AdminController@setuju')->middleware(['auth', 'role:admin'])->name('puskesmas.setuju');

//Berita
Route::get('/berita/index', 'BeritaController@index')->middleware(['auth', 'role:admin|user'])->name('berita.index');
Route::get('/berita/store', 'BeritaController@create')->middleware(['auth', 'role:admin|user'])->name('berita.store');
Route::post('/berita/create', 'BeritaController@store')->middleware(['auth', 'role:admin|user'])->name('berita.create');
Route::delete('/berita/delete{id}', 'BeritaController@destroy')->middleware(['auth', 'role:admin|user'])->name('berita.destroy');
Route::get('/berita/edit/{id}', 'BeritaController@edit')->middleware(['auth', 'role:admin|user'])->name('berita.edit');
Route::put('/berita/update/{id}', 'BeritaController@update')->middleware(['auth', 'role:admin|user'])->name('berita.update');
Route::get('/berita/admin', 'AdminController@berita')->middleware(['auth', 'role:admin'])->name('berita.admin');
Route::post('/berita/status/{id}', 'AdminController@aproveBerita')->middleware(['auth', 'role:admin'])->name('berita.setuju');

//Beranda
Route::get('/pageawal', 'BerandaController@index')->middleware(['auth', 'role:admin|user'])->name('beranda.index');
Route::get('/beranda/create', 'BerandaController@create')->middleware(['auth', 'role:admin|user'])->name('beranda.create');
Route::post('/beranda/store', 'BerandaController@store')->middleware(['auth', 'role:admin|user'])->name('beranda.store');
Route::delete('/beranda/delete{id}', 'BerandaController@destroy')->middleware(['auth', 'role:admin|user'])->name('beranda.destroy');
Route::get('/beranda/edit/{id}', 'BerandaController@edit')->middleware(['auth', 'role:admin|user'])->name('beranda.edit');
Route::put('/beranda/update/{id}', 'BerandaController@update')->middleware(['auth', 'role:admin|user'])->name('beranda.update');
Route::get('/beranda/admin', 'AdminController@beranda')->middleware(['auth', 'role:admin'])->name('beranda.admin');
Route::post('/beranda/status/{id}', 'AdminController@aproveBeranda')->middleware(['auth', 'role:admin'])->name('beranda.aprove');

//Kecamatan
Route::get('/camat', 'KecamatanController@index')->middleware(['auth', 'role:admin|user'])->name('kecamatan.index');
Route::get('/kecamatan/create', 'kecamatanController@create')->middleware(['auth', 'role:admin|user'])->name('kecamatan.create');
Route::post('/kecamatan/store', 'kecamatanController@store')->middleware(['auth', 'role:admin|user'])->name('kecamatan.store');
Route::delete('/kecamatan/delete{id}', 'kecamatanController@destroy')->middleware(['auth', 'role:admin|user'])->name('kecamatan.destroy');
Route::get('/kecamatan/edit/{id}', 'kecamatanController@edit')->middleware(['auth', 'role:admin|user'])->name('kecamatan.edit');
Route::put('/kecamatan/update/{id}', 'kecamatanController@update')->middleware(['auth', 'role:admin|user'])->name('kecamatan.update');
Route::get('/kecamatan/admin', 'AdminController@kecamatan')->middleware(['auth', 'role:admin'])->name('kecamatan.admin');
Route::post('/kecamatan/status/{id}', 'AdminController@aprovekecamatan')->middleware(['auth', 'role:admin'])->name('kecamatan.aprove');

//kelurahan
Route::get('/kelurahan', 'KelurahanController@index')->middleware(['auth', 'role:admin|user'])->name('kelurahan.index');
Route::get('/kelurahan/create', 'kelurahanController@create')->middleware(['auth', 'role:admin|user'])->name('kelurahan.create');
Route::post('/kelurahan/store', 'kelurahanController@store')->middleware(['auth', 'role:admin|user'])->name('kelurahan.store');
Route::delete('/kelurahan/delete{id}', 'kelurahanController@destroy')->middleware(['auth', 'role:admin|user'])->name('kelurahan.destroy');
Route::get('/kelurahan/edit/{id}', 'kelurahanController@edit')->middleware(['auth', 'role:admin|user'])->name('kelurahan.edit');
Route::put('/kelurahan/update/{id}', 'kelurahanController@update')->middleware(['auth', 'role:admin|user'])->name('kelurahan.update');
Route::get('/kelurahan/admin', 'AdminController@kelurahan')->middleware(['auth', 'role:admin'])->name('kelurahan.admin');
Route::post('/kelurahan/status/{id}', 'AdminController@aprovekelurahan')->middleware(['auth', 'role:admin'])->name('kelurahan.aprove');