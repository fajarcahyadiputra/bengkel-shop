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
Route::group(['middleware' => 'loginRegister'], function () {
  Route::get('/login', 'LoginController@index')->name('login');
  Route::post('/login', 'LoginController@store');
  Route::get('/register', 'RegisterController@index')->name('register');
  Route::post('/register', 'RegisterController@store');
});

//ENDPOINT ADMIN

Route::group(['middleware' => ['auth', 'admin']], function () {

  Route::post('/logout', 'LoginController@logout')->name('logout');
  //endpoint home
  Route::get('/dashboard', 'HomeController@index')->name('dashboard');
  //endpoint user
  Route::resource('/user', 'UserController');
  Route::post('/ganti-password', 'UserController@gantiPassword');
  Route::get('/alamat-user/{id}', 'UserController@dataAlamat');
  Route::post('/user/check-email', 'UserController@checkEmail');

  //endpoint barang
  Route::resource('/barang', 'BarangController');
  Route::get('/foto-barang/{barang_id}', 'FotoBarangController@index');
  Route::post('/barang/tambah-foto', 'FotoBarangController@store');
  Route::delete('/barang/hapus-foto/{id}', 'FotoBarangController@destroy');

  //endpoint kategori barang
  Route::resource('/kategori', 'KategoriController');
  //endpoint transaksi
  Route::resource('/transaksi', 'TransaksiController');
  //endpoint rekening
  Route::resource('/rekening', 'RekeningController');
  Route::post('/rekening/edit-foto', 'RekeningController@editFoto');
});



Route::group(['namespace' => 'Users'], function () {
  // USER
  Route::get('/', "HomeController@index");
  Route::get('/profil/{id}', "ProfilController@index")->middleware('auth');
  Route::get('/keranjang/{id}', "KeranjangController@index")->name('keranjang')->middleware('auth');
  Route::get('/add-to-cart/{id}', "KeranjangController@addToCart")->middleware('addToCart');
  Route::post('/add-qty', "KeranjangController@addQty")->name('add-qty')->middleware('auth');
  Route::get('/hapus-barang/{id}', "KeranjangController@hapusBarang")->middleware('auth');
  Route::post('/go-to-checkout', "KeranjangController@goToCheckout")->name('goCheckout');
  Route::get('/proses-checkout', "CheckoutController@index")->middleware('auth');
  Route::post('/push-transaksi', "CheckoutController@pushTransaksi")->name('pushTransaksi')->middleware('auth');
  Route::post('/check-cost', "CheckoutController@checkCostRajaongkir")->name('checkCost')->middleware('auth');
  //endpoint about
  Route::get('/about', "AboutController@index");
});
Route::get('/detail-transaksi/{invoice}', "TransaksiController@detailTransaksi")->middleware('auth');
Route::get('/index-detail-transaksi', "TransaksiController@indexDetailTransaksi")->middleware('auth');
Route::post('/bukti-transfer', "TransaksiController@buktiTransfer")->name('buktitransfer')->middleware('auth');
Route::get('/logout-user', 'LoginController@logoutUser')->name('logoutUser')->middleware('auth');
Route::get('/search-product', 'BarangController@searchProduct');
