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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/clear-cache', function () {
    Artisan::call('cache:clear');
    return "Cache is cleared";
});

Route::get('/about', function () {
    return view('about');
});
Route::resource('kategori', 'KategoriController')->middleware('auth');
Route::resource('buku', 'BukuController')->middleware('auth');
Route::get('koleksi', 'BukuController@KoleksiBuku')->middleware('auth');
Route::resource('daftar', 'DaftarController')->middleware('auth');
Route::resource('user', 'UsersController')->middleware('auth');
Route::resource('cart', 'CartController')->middleware('auth');
Route::get('daftar', 'CartController@HistoriCart')->middleware('auth');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
