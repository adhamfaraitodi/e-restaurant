<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\LogoutController;
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

Route::group(['middleware' => ['guest']], function() {
    /**
     * Routes admin
     */
    Route::get('/admin/login', [LoginController::class, 'show'])->name('login.show');
    Route::post('/admin/login', [LoginController::class, 'login'])->name('login.perform');
    /**
     * Routes Customer
     */
    Route::get('/meja/{meja}', [PesanController::class, 'show'])->name('pesan.show');
    Route::post('/customer/setupSession',[PesanController::class, 'setupSession'])->name('pesan.setupSession');
    Route::group(['middleware' => ['customerSessionCheck']],function(){
        Route::get('/meja/{meja}/menu', [PesanController::class, 'menu'])->name('pesan.menu');
        Route::get('/meja/{meja}/menu/{id}', [PesanController::class, 'addMenuCart'])->name('pesan.add');
        Route::get('/meja/{meja}/keranjang', [PesanController::class, 'cartshow'])->name('pesan.cartshow');
        Route::get('/meja/{meja}/keranjang/checkout', [PesanController::class, 'checkOut'])->name('pesan.checkout');
        Route::delete('/meja/{meja}/keranjang/{id}', [PesanController::class, 'cartdelete'])->name('pesan.cartdelete');
        Route::get('/meja/{meja}/flush', [PesanController::class, 'flush'])->name('pesan.flush');
        Route::get('/meja/{meja}/bayar', [PesanController::class, 'test'])->name('pesan.test');
    });

    Route::get('/', [AdminController::class, 'show'])->name('admin.show');

});

Route::group(['middleware' => ['auth']], function() {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/register',[RegisterController::class, 'show'])->name('register.show');
    Route::post('/admin/register',[RegisterController::class, 'register'])->name('register.perform');
    Route::get('/admin/menu/kelolamenu', [MenuController::class, 'show'])->name('menu.show');
    Route::get('/admin/menu/{menu}/edit', [MenuController::class, 'edit'])->name('menu.edit');
    Route::patch('/admin/menu/{menu}/update', [MenuController::class, 'update'])->name('menu.update');
    Route::post('/admin/menu/{menu}/delete', [MenuController::class, 'destroy'])->name('menu.destroy');
    Route::get('/admin/menu/tambah', [MenuController::class, 'create'])->name('menu.create');
    Route::post('/admin/menu/tambah', [MenuController::class, 'store'])->name('menu.store');
    Route::get('/admin/pesanan/masuk', [PesananController::class, 'show'])->name('pesan.show');
    Route::get('/admin/pesanan/masuk/{id}', [PesananController::class, 'detailshow'])->name('pesan.detailshow');
    Route::post('/admin/pesanan/selesai/{id}', [PesananController::class, 'pesananselesai'])->name('pesan.pesananselesai');
    Route::get('/admin/pesanan/selesai', [PesananController::class, 'selesaishow'])->name('pesanselesai.show');
    Route::get('/admin/laporan', [LaporanController::class, 'show'])->name('laporan.show');

    Route::get('/admin/karyawan',[KaryawanController::class, 'show'])->name('karyawan.show');
    Route::post('/admin/karyawan/{id}/delete',[KaryawanController::class, 'delKaryawan'])->name('karyawan.delete');
    Route::post('/admin/karyawan/{id}/update',[KaryawanController::class, 'UpdateKaryawan'])->name('karyawan.update');

    Route::get('/admin/karyawan/{id}/edit',[KaryawanController::class, 'editKaryawan'])->name('karyawan.edit');


    Route::get('/admin/logout', [LogoutController::class, 'perform'])->name('logout.perform');
});

