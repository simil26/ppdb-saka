<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminDataPendaftarController;
use App\Http\Controllers\Admin\AdminVerifikasiPendaftarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\DataDiriController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\UploadFilesController;
use App\Http\Controllers\User\DataOrangTuaController;
use App\Http\Controllers\User\DataPeriodikController;
use App\Http\Controllers\Front\DataPendaftarController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/data-pendaftar', [DataPendaftarController::class, 'index']);
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('user/dashboard', [DashboardController::class, 'index'])->name('user.dashboard');
Route::get('user/data-diri', [DataDiriController::class, 'index'])->name('user.dataDiri');
Route::get('user/data-orang-tua', [DataOrangTuaController::class, 'index'])->name('user.dataOrangTua');
Route::get('user/data-periodik', [DataPeriodikController::class, 'index'])->name('user.dataPeriodik');
Route::get('user/upload-files', [UploadFilesController::class, 'index'])->name('user.uploadFiles');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('register.store');
Route::post('login', [LoginController::class, 'login'])->name('loginAttempt');
Route::get('logout', [LogoutController::class, 'logout'])->name('logoutAttempt');

Route::post('user/data-diri/simpan', [DataDiriController::class, 'store'])->name('user.dataDiri.store');
Route::post('user/data-diri/update', [DataDiriController::class, 'update'])->name('user.dataDiri.update');
Route::post('user/data-orang-tua', [DataOrangTuaController::class, 'store'])->name('user.store.dataOrangTua');
Route::post('user/data-periodik', [DataPeriodikController::class, 'store'])->name('user.store.dataPeriodik');
Route::post('user/upload-files', [UploadFilesController::class, 'store'])->name('user.store.uploadFiles');

Route::get('admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('admin/data-pendaftar', [AdminDataPendaftarController::class, 'index'])->name('admin.dataPendaftar');
Route::get('admin/verifikasi-pendaftar', [AdminVerifikasiPendaftarController::class, 'index'])->name('admin.verifikasiPendaftar');
