<?php

use App\Http\Controllers\BansosController;
use App\Http\Controllers\InformasiController;
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
    Route::get('/', function () {
        return redirect(route('index'));
    });
    Route::get('/{id}', [InformasiController::class, 'detail']);
});

Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', [BansosController::class, 'index']);
    Route::post('/', [BansosController::class, 'proses'])->name('prosesBansos');
});

Route::group(['prefix' => 'persuratan'], function () {
    Route::get('/', [PersuratanController::class, 'index']);
    Route::post('/', [PersuratanController::class, 'proses'])->name('prosesPersuratan');
});

Route::group(['prefix' => 'rt'], function () {
    Route::get('/', [RtController::class, 'index']);
});

Route::get('/admin/penduduk', function () {
    return view('admin.penduduk.index');
});

Route::get('/admin/informasi', function () {
    return view('admin.informasi.index');
});

Route::get('/admin/informasi/create_kegiatan', function () {
    return view('admin.informasi.create_kegiatan');
});

Route::get('/admin/informasi/create_pengumuman', function () {
    return view('admin.informasi.create_pengumuman');
});
