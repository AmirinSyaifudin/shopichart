<?php

// Route::get('/', function () {
//     return 'admin pages';
// })->name('dashboard');

// Route::get('/admin', function () {
//     return 'admin pages';
// })->name('admin');


Route::get('/', 'HomeController@index')->name('dashboard');

Route::get('/visitor', 'VisitorController@index')->name('visitor.index');
// Json Visitor

Route::get('/visitor/data', 'DataController@visitors')->name('visitor.data');

// SESSION
Route::get('session/put', 'SessionController@store');
Route::get('session/get', 'SessionController@index');
Route::get('session/push', 'SessionController@push');
Route::get('session/del', 'SessionController@delete');


Route::get('/drink', 'DrinkController@index')->name('drink.index');
Route::get('/drink/create', 'DrinkController@create')->name('drink.create');
Route::post('/drink', 'DrinkController@store')->name('drink.store');
Route::get('/drink/{drink}/edit', 'DrinkController@edit')->name('drink.edit');
Route::put('/drink/{drink}', 'DrinkController@update')->name('drink.update');
Route::delete('/drink/{drink}', 'DrinkController@destroy')->name('drink.destroy');
//jSon Drink
Route::get('/drink/data', 'DataController@drinks')->name('drink.data');


Route::get('/food', 'FoodController@index')->name('food.index');
Route::get('/food/create', 'FoodController@create')->name('food.create');
Route::post('/food', 'FoodController@store')->name('food.store');
Route::get('/food/{food}/edit', 'FoodController@edit')->name('food.edit');
Route::put('/food/{food}', 'FoodController@update')->name('food.update');
Route::delete('/food/{food}', 'FoodController@destroy')->name('food.destroy');

// jSon Food
Route::get('/food/data', 'DataController@foods')->name('food.data');

// DASHBOARD
Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');

// kategori
// Route::get('/katagori', 'KatagoriController@index')->name('katagori.index');
// Route::get('/katagori/create', 'KatagoriController@create')->name('katagori.create');
// Route::post('/katagori', 'KatagoriController@store')->name('katagori.store');
// Route::get('/katagori/{katagori}/edit', 'KatagoriController@edit')->name('katagori.edit');
// //Route::get('/katagori/edit/{$id}', 'KatagoriController@edit')->name('katagori.edit');
// Route::put('/katagori/{katagori}', 'KatagoriController@update')->name('katagori.update');
// Route::delete('/katagori/{katagori}', 'KatagoriController@destroy')->name('katagori.destroy');

// Route::resource('/katagori', 'KatagoriController');

//produk
Route::get('/produk', 'ProdukController@index')->name('produk.index');
Route::get('/produk/create', 'ProdukController@create')->name('produk.create');
Route::post('/produk', 'ProdukController@store')->name('produk.store');
Route::get('/produk/{produk}/edit', 'ProdukController@edit')->name('produk.edit');
// Route::get('/produk/edit/{$id}', 'ProdukController@edit')->name('produk.edit');
Route::put('/produk/{produk}', 'ProdukController@update')->name('produk.update');
Route::delete('/produk/{produk}', 'ProdukController@destroy')->name('produk.destroy');
Route::get('/produk/{produk}/detail', 'ProdukController@detail')->name('produk.detail');
// Route::resource('/produk', 'ProdukController');

//LAPORAN
Route::get('laporan/top-produk', 'LaporanController@topproduk')->name('laporan.top-produk');
Route::get('laporan/top-user', 'LaporanController@topuser')->name('laporan.top-user');
Route::get('laporan/produkmahal', 'LaporanController@produkmahal')->name('laporan.produkmahal');
Route::get('laporan/produkmurah', 'LaporanController@produkmurah')->name('laporan.produkmurah');


//kabupaten
Route::get('/kabupaten', 'KabupatenController@index')->name('kabupaten.index');
Route::get('/kabupaten/create', 'KabupatenController@create')->name('kabupaten.create');
Route::post('/kabupaten', 'KabupatenController@store')->name('kabupaten.store');
Route::get('/kabupaten/{kabupaten}/edit', 'KabupatenController@edit')->name('kabupaten.edit');
// Route::get('/kabupaten/edit/{$id}', 'kabupatenController@edit')->name('kabupaten.edit');
Route::put('/kabupaten/{kabupaten}', 'KabupatenController@update')->name('kabupaten.update');
Route::delete('/kabupaten/{kabupaten}', 'KabupatenController@destroy')->name('kabupaten.destroy');
//Route::get('/kabupaten/{kabupaten}/detail', 'KabupatenController@detail')->name('kabupaten.detail');
// Route::resource('/kabupaten', 'KabupatenController');

// transaksi
Route::get('/transaksi', 'TransaksiController@index')->name('transaksi.index');
Route::get('/transaksi/create', 'TransaksiController@create')->name('transaksi.create');
Route::post('/transaksi', 'TransaksiController@store')->name('transaksi.store');
Route::get('/transaksi/{transaksi}/edit', 'TransaksiController@edit')->name('transaksi.edit');

// Route::get('/transaksi/edit/{$id}', 'transaksiController@edit')->name('transaksi.edit');
Route::put('/transaksi/{transaksi}', 'TransaksiController@update')->name('transaksi.update');
Route::delete('/transaksi/{transaksi}', 'TransaksiController@destroy')->name('transaksi.destroy');
// Route::get('/transaksi/{transaksi}/detail', 'TransaksiController@detail')->name('transaksi.detail');

Route::get('/transaksi/{transaksi}/transaksi_detail', 'TransaksiController@transaksi_detail')->name('transaksi.transaksi_detail');

// Route::resource('/transaksi', 'TransaksiController');

// CUSTOMER
Route::get('/customer', 'CustomerController@index')->name('customer.index');
Route::get('/customer/create', 'CustomerController@create')->name('customer.create');
Route::post('/customer', 'CustomerController@store')->name('customer.store');
Route::get('/customer/{customer}/edit', 'CustomerController@edit')->name('customer.edit');

// Route::get('/customer/edit/{$id}', 'customerController@edit')->name('customer.edit');
Route::put('/customer/{customer}', 'CustomerController@update')->name('customer.update');
Route::delete('/customer/{customer}', 'CustomerController@destroy')->name('customer.destroy');
Route::get('/customer/{customer}/detail', 'CustomerController@detail')->name('customer.detail');

// Route::resource('/customer', 'CustomerController');

//TRANSAKSI DETAIL
// Route::get('/transaksi_detail', 'TransaksiController@detail_trs');

//provinsi
Route::resource('/provinsi', 'ProvinsiController');

// kota
Route::resource('/kota', 'KotaController');

// kota
Route::resource('/katagori', 'KatagoriController');