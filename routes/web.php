<?php

use Illuminate\Support\Facades\Route;

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

//ENDPOINT ADMIN

//end point home
Route::get('/dashboard', 'HomeController@index');
//end point user
Route::resource('/user', 'UserController');
Route::post('/user/ganti-password', 'UserController@gantiPassword');
Route::get('/user/alamat-user/{id}', 'UserController@dataAlamat');
Route::post('/user/check-email', 'UserController@checkEmail');
//endpoint barang
Route::resource('/barang', 'BarangController');
//endpoint kategori barang
Route::resource('/kategori', 'KategoriController');
//endpoint transaksi
Route::resource('/transaksi', 'TransaksiController');
//endpoint rekening
Route::resource('/rekening', 'RekeningController');
Route::post('/rekening/edit-foto', 'RekeningController@editFoto');
//endpoint foto barang
Route::get('/barang/foto-barang/{barang_id}', 'FotoBarangController@index');
Route::post('/barang/tambah-foto', 'FotoBarangController@store');
Route::delete('/barang/hapus-foto/{id}', 'FotoBarangController@destroy');


// USER
Route::get('/', function () {
  return view("user.index");
});