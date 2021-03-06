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

//ENDPOINT AUTH

//endpoint aut
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store');
Route::post('/logout', 'LoginController@logout')->name('logout');

//ENDPOINT ADMIN

Route::group(['middleware' => ['auth', 'admin']], function () {

  //endpoint home
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
  //endpoint user
  Route::group(['prefix' => 'user'], function () {
    Route::resource('/', 'UserController');
    Route::post('/ganti-password', 'UserController@gantiPassword');
    Route::get('/alamat-user/{id}', 'UserController@dataAlamat');
    Route::post('/check-email', 'UserController@checkEmail');
  });

  //endpoint barang
  Route::group(['prefix' => 'barang'], function () {
    Route::resource('/', 'BarangController');
    Route::get('/foto-barang/{barang_id}', 'FotoBarangController@index');
    Route::post('/tambah-foto', 'FotoBarangController@store');
    Route::delete('/hapus-foto/{id}', 'FotoBarangController@destroy');
  });

  //endpoint kategori barang
  Route::resource('/kategori', 'KategoriController');
  //endpoint transaksi
  Route::resource('/transaksi', 'TransaksiController');
  //endpoint rekening
  Route::resource('/rekening', 'RekeningController');
  Route::post('/rekening/edit-foto', 'RekeningController@editFoto');
});



// USER
Route::get('/', "Users\HomeController@index");