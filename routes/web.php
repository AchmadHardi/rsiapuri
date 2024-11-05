<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CoaController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\JurnalController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TriangleController;
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
//route login
Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'process']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

// route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

//route barang
Route::resource('/barang', BarangController::class)->middleware('auth');
Route::post('/jabatans', [JabatanController::class, 'store']);
Route::resource('/company', CompanyController::class)->middleware('auth');
Route::resource('/jurnal', JurnalController::class)->middleware('auth');
Route::resource('/transaksi', TransaksiController::class)->middleware('auth');
Route::resource('/coa', CoaController::class)->middleware('auth');
Route::get('/triangle/{x}', [TriangleController::class, 'show']);
