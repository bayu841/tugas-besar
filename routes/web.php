<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DetailjualController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\PenjualanController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();
Route::resource('pembeli',PembeliController::class);
Route::resource('pembelian',PembelianController::class);
Route::resource('supplier',SupplierController::class);
Route::resource('barang',BarangController::class);
Route::resource('penjualan',PenjualanController::class);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/detailjual/export-pdf', [DetailjualController::class, 'exportPdf'])->name('detailjual.exportPdf');
Route::resource('detailjual',DetailjualController::class);