<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PersuratanController;
use App\Http\Controllers\RtController;
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

Route::get('/', [InformasiController::class, 'index'])->name('index');

Route::group(['prefix' => 'informasi'], function () {
    Route::get('/', [InformasiController::class, 'index'])->name('informasi');
    Route::get('/{id}', [InformasiController::class, 'detail'])->name('detailInformasi');
});

Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', [BansosController::class, 'index'])->name('bansos');
    Route::post('/', [BansosController::class, 'proses'])->name('prosesBansos');
});

Route::group(['prefix' => 'persuratan'], function () {
    Route::get('/', [PersuratanController::class, 'index'])->name('persuratan');
    Route::post('/', [PersuratanController::class, 'proses'])->name('prosesPersuratan');
});

Route::group(['prefix' => 'rt'], function () {
    Route::get('/', [RtController::class, 'index'])->name('rt');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin');
    Route::post('/login', [AdminController::class, 'login'])->name('login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
});
