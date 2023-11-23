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
        Route::get('/admin/register','RegisterController@show')->name('register.show');
        Route::post('/admin/register','RegisterController@register')->name('register.perform');
        /**
         * Routes Customer
         */
        Route::get('/', 'AdminController@show')->name('admin.show');
        Route::get('/pesan/{meja}', 'PesanController@show')->name('pesan.show');
        Route::get('/pesan/{meja}/menu', 'PesanController@test')->name('pesan.test');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/admin/menu/kelolamenu', 'MenuController@show')->name('menu.show');
        Route::get('/admin/menu/{menu}/edit', 'MenuController@edit')->name('menu.edit');
        Route::patch('/admin/menu/{menu}/update', 'MenuController@update')->name('menu.update');
        Route::post('/admin/menu/{menu}/delete', 'MenuController@destroy')->name('menu.destroy');
        Route::get('/admin/menu/tambah', 'MenuController@create')->name('menu.create');
        Route::post('/admin/menu/tambah', 'MenuController@store')->name('menu.store');
        Route::get('/admin/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

