<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PenggunaController;

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



//layanan
Route::get('/layanan', 'LayananController@index')->name('user.layanan');
Route::get('/layanan/store', 'LayananController@create')->name('layanan.store');
Route::post('/layanan/create', 'LayananController@store')->name('layanan.create');
