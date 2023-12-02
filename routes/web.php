<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::group(['middleware' => ['guest']], function() {
        /**
         * Routes admin
         */
        Route::get('/admin/login', 'LoginController@show')->name('login.show');
        Route::post('/admin/login', 'LoginController@login')->name('login.perform');
        /**
         * Routes Customer
         */
        Route::get('/meja/{meja}', 'PesanController@show')->name('pesan.show');
        Route::post('/customer/setupSession','PesanController@setupSession')->name('pesan.setupSession');
        Route::group(['middleware' => ['customerSessionCheck']],function(){
            Route::get('/meja/{meja}/menu', 'PesanController@menu')->name('pesan.menu');
            Route::get('/meja/{meja}/menu/{id}', 'PesanController@addMenuCart')->name('pesan.add');
            Route::get('/meja/{meja}/keranjang', 'PesanController@cartshow')->name('pesan.cartshow');
            Route::get('/meja/{meja}/keranjang/checkout', 'PesanController@checkOut')->name('pesan.checkout');
            Route::delete('/meja/{meja}/keranjang/{id}', 'PesanController@cartdelete')->name('pesan.cartdelete');
            Route::get('/meja/{meja}/flush', 'PesanController@flush')->name('pesan.flush');
            Route::get('/meja/{meja}/bayar', 'PesanController@test')->name('pesan.test');
        });

        Route::get('/', 'AdminController@show')->name('admin.show');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/admin/register','RegisterController@show')->name('register.show');
        Route::post('/admin/register','RegisterController@register')->name('register.perform');
        Route::get('/admin/menu/kelolamenu', 'MenuController@show')->name('menu.show');
        Route::get('/admin/menu/{menu}/edit', 'MenuController@edit')->name('menu.edit');
        Route::patch('/admin/menu/{menu}/update', 'MenuController@update')->name('menu.update');
        Route::post('/admin/menu/{menu}/delete', 'MenuController@destroy')->name('menu.destroy');
        Route::get('/admin/menu/tambah', 'MenuController@create')->name('menu.create');
        Route::post('/admin/menu/tambah', 'MenuController@store')->name('menu.store');
        Route::get('/admin/pesanan/masuk', 'PesananController@show')->name('pesan.show');
        Route::get('/admin/pesanan/masuk/{id}', 'PesananController@detailshow')->name('pesan.detailshow');
        Route::post('/admin/pesanan/selesai/{id}', 'PesananController@pesananselesai')->name('pesan.pesananselesai');
        Route::get('/admin/pesanan/selesai', 'PesananController@selesaishow')->name('pesanselesai.show');
        Route::get('/admin/laporan', 'LaporanController@show')->name('laporan.show');
        Route::get('/admin/karyawan','KaryawanController@show')->name('karyawan.show');
        Route::get('/admin/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

