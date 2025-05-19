<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PenggunaController;
use App\http\Controllers\PuskesmasController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PenggunaController@index')->name('p.index');

Route::get('/Login', 'Auth\LoginController@showLoginForm')->name('show');
Route::post('/Login', 'Auth\LoginController@login')->name('login');

//layanan
Route::get('/layanan', 'LayananController@index')->name('user.layanan');
Route::get('/layanan/store', 'LayananController@create')->name('layanan.store');
Route::post('/layanan/create', 'LayananController@store')->name('layanan.create');

Route::delete('/layanan/delete{id}', 'LayananController@destroy')->name('layanan.destroy');
Route::get('/layanan/edit/{id}', 'LayananController@edit')->name('layanan.edit');
Route::put('/layanan/update/{id}', 'LayananController@update')->name('layanan.update');

Route::get('/layanan/admin', 'AdminController@index')->name('layanan.admin');
Route::post('/layanan/status/{id}', 'AdminController@aprove')->name('layanan.aprove');


//Puskesmas
Route::get('/kesmas', 'PuskesmasController@index')->name('puskesmas.index');
Route::get('/puskesmas/store', 'PuskesmasController@create')->name('puskesmas.store');
Route::post('/puskesmas/create', 'PuskesmasController@store')->name('puskesmas.create');

Route::delete('/puskesmas/delete{id}', 'PuskesmasController@destroy')->name('puskesmas.destroy');
Route::get('/puskesmas/edit/{id}', 'PuskesmasController@edit')->name('puskesmas.edit');
Route::put('/puskesmas/update/{id}', 'PuskesmasController@update')->name('puskesmas.update');

Route::get('/puskesmas/admin', 'AdminController@puskesmas')->name('puskesmas.admin');
Route::post('/puskesmas/status/{id}', 'AdminController@setuju')->name('puskesmas.setuju');


//Berita
Route::get('/pengumuman', 'BeritaController@index')->name('berita.index');
Route::get('/berita/store', 'BeritaController@create')->name('berita.store');
Route::post('/berita/create', 'BeritaController@store')->name('berita.create');

Route::delete('/berita/delete{id}', 'BeritaController@destroy')->name('berita.destroy');
Route::get('/berita/edit/{id}', 'BeritaController@edit')->name('berita.edit');
Route::put('/berita/update/{id}', 'BeritaController@update')->name('berita.update');

Route::get('/berita/admin', 'AdminController@berita')->name('berita.admin');
Route::post('/berita/status/{id}', 'AdminController@aproveBerita')->name('berita.setuju');


//Beranda
Route::get('/pageawal', 'BerandaController@index')->name('beranda.index');
Route::get('/beranda/create', 'BerandaController@create')->name('beranda.create');
Route::post('/beranda/store', 'BerandaController@store')->name('beranda.store');

Route::delete('/beranda/delete{id}', 'BerandaController@destroy')->name('beranda.destroy');


Auth::routes();

Route::get('/home', 'HomeController@index');
Route::delete('/delete/{id}', 'LayananController@destroy')->name('layanan.delete');
