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

Route::get('/', function () {
    return view('admin.dashboard');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/admin/login', 'login')->name('login');
    Route::post('/logout', 'logout')->name('logout');

});

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/dashboard', 'dashboard')->name('dashboard');
    Route::get('/admin/tambahMenuForm','tambahMenuForm')->name('admin.tambahMenuForm');
    Route::post('/admin/tambahMenu','tambahMenu')->name('admin.tambahMenu');
});
