<?php

use Illuminate\Support\Facades\Route;
// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('frontend.templates.default');
// });

Route::get('/', 'Frontend\SiteController@homeapp');
// PRODUK
Route::get('/produk', 'Frontend\\ProdukController@index');

Route::get('/produk/addchartproduk/{produk_id}', 'Frontend\\ProdukController@addchartproduk')->where("produk_id", "[0-9]+");
Route::get('/cart', 'Frontend\\ProdukController@cart');

Route::get('/produk/{produk}/ktproduk', 'Frontend\\ProdukController@ktproduk')->name('produk.ktproduk');

Route::get('/produk/{produk}/detail', 'Frontend\\ProdukController@detail')->name('produk.detail');
// Route::get('/produk/{produk}/listproduk', 'Frontend\\ProdukController@listproduk')->name('produk.listproduk');

// TRANSAKSI PRODUK
Route::get('/transaksi/{transaksi}', 'Frontend\\SiteController@transaksi')->name('site.transaksi')->middleware('auth');
Route::post('/transaksi/proses_transaksi', 'Frontend\\SiteController@proses_transaksi')->name('site.proses_transaksi');
//Route::get('/transaksi/{transaksi}/detail', 'Frontend\\SiteController@detail')->name('site.detail');




// KONTAK
Route::get('/kontak', 'Frontend\\SiteController@kontak');

// BLOG
Route::get('/blog', 'Frontend\\SiteController@blog');

// BLOGSINGLE
Route::get('/blogsingle', 'Frontend\\SiteController@blogsingle');

// GALERY
Route::get('/galery', 'Frontend\\SiteController@galery');

// GALERY
Route::get('/loggin', 'Frontend\\SiteController@loggin');

// GALERY
Route::get('/registter', 'Frontend\\SiteController@registter');

//CUSTOMER
Route::get('/customer', 'Frontend\\CustomerController@customer');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');