<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\PerusahaanController;
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
    return view('welcome');
});
Route::get('login',[AuthController::class,'index'])->name('login');
Route::post('login',[AuthController::class,'check']);
Route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::middleware(['auth','checkAdmin'])->group(function(){
    Route::get('/dashboard',[Dashboard::class,'index'])->name('dashboardAdmin');
});

//Routing Perusahaan
Route::prefix('dashboard')->middleware('checkAdmin')->group(function(){
    Route::get('/perusahaan',[PerusahaanController::class,'index'])->name('listPerusahaan');
    Route::get('/perusahaan/edit',[PerusahaanController::class,'edit'])->name('editPerusahaan');
    Route::post('/perusahaan/simpan',[PerusahaanController::class,'store'])->name('simpanPerusahaan');

    // Cabang
    Route::get('/cabang',[CabangController::class,'index'])->name('cabangIndex');
    Route::get('/cabang/tambah',[CabangController::class,'create'])->name('tambahCabang');
    Route::post('/cabang/simpan',[CabangController::class,'store'])->name('simpanCabang');
    Route::get('/cabang/edit/{id}',[CabangController::class,'edit']);
    Route::post('/cabang/edit/simpan',[CabangController::class,'store'])->name('simpanEditCabang');
    Route::delete('/cabang/hapus',[CabangController::class,'destroy'])->name('hapusCabang');

    // Barang
    Route::get('/barang',[BarangController::class,'index'])->name('barangIndex');
    Route::get('/barang/tambah',[BarangController::class,'create'])->name('tambahBarang');
    Route::post('/barang/simpan',[BarangController::class,'store'])->name('simpanBarang');
    Route::get('/barang/edit/{id}',[BarangController::class,'edit']);
    Route::post('/barang/edit/simpan',[BarangController::class,'store'])->name('simpanEditBarang');
    Route::delete('/barang/hapus',[BarangController::class,'destroy'])->name('hapusBarang');
});

Route::prefix('kasir')->middleware(['auth'])->group(function(){
    Route::get('/dashboard',[DashboardKasir::class,'index'])->name('dashboardKasir');
});