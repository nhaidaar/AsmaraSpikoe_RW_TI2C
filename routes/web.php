<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InformasiController;
use App\Http\Controllers\KeuanganController;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

Route::group(['prefix' => 'informasi'], function () {
    Route::get('/', [InformasiController::class, 'index'])->name('informasi');
    Route::get('/{id}', [InformasiController::class, 'detail'])->name('detailPengumuman');
    Route::group(['prefix' => 'pengumuman'], function () {
        Route::get('/', [InformasiController::class, 'index']);
        Route::get('/create', [InformasiController::class, 'create_pengumuman'])->name('createPengumuman');
        Route::post('/create', [InformasiController::class, 'store_pengumuman'])->name('storePengumuman');
        Route::get('/{id}', [InformasiController::class, 'edit_pengumuman'])->name('editPengumuman');
        Route::put('/{id}', [InformasiController::class, 'update_pengumuman'])->name('updatePengumuman');
    });
    Route::group(['prefix' => 'kegiatan'], function () {
        Route::get('/', [InformasiController::class, 'index']);
        Route::get('/create', [InformasiController::class, 'create_kegiatan'])->name('createKegiatan');
        Route::post('/create', [InformasiController::class, 'store_kegiatan'])->name('storeKegiatan');
        Route::get('/{id}', [InformasiController::class, 'edit_kegiatan'])->name('editKegiatan');
        Route::put('/{id}', [InformasiController::class, 'update_kegiatan'])->name('updateKegiatan');
    });
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

Route::group(['prefix' => 'penduduk'], function () {
    Route::get('/', [PendudukController::class, 'index'])->name('penduduk');
    Route::group(['prefix' => 'keluarga'], function () {
        Route::get('/', [PendudukController::class, 'index']);
        Route::get('/create', [PendudukController::class, 'create_keluarga'])->name('createKeluarga');
        Route::post('/create', [PendudukController::class, 'store_keluarga'])->name('storeKeluarga');
    });
});

Route::group(['prefix' => 'keuangan'], function () {
    Route::get('/', [KeuanganController::class, 'index'])->name('keuangan');
});
