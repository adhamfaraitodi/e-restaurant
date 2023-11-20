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
         * Login Routes
         */
        Route::get('/admin/login', 'LoginController@show')->name('login.show');
        Route::post('/admin/login', 'LoginController@login')->name('login.perform');
        Route::get('/admin/register','RegisterController@show')->name('register.show');
        Route::post('/admin/register','RegisterController@register')->name('register.perform');

    });

    Route::group(['middleware' => ['auth']], function() {
        Route::get('/admin', 'AdminController@dashboard')->name('admin.dashboard');
        Route::get('/admin/kelolamenu', 'AdminController@tambahMenuForm')->name('admin.tambahMenuForm');
        Route::post('/admin/kelolamenu', 'AdminController@tambahMenu')->name('admin.tambahMenu');
        Route::get('/admin/logout', 'LogoutController@perform')->name('logout.perform');
    });
});

