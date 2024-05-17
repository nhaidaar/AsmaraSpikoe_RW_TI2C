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

Route::get('/', [InformasiController::class, 'index']);

Route::group(['prefix' => 'informasi'], function () {
    Route::get('/{id}', [InformasiController::class, 'detail']);
});

Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', [BansosController::class, 'index']);
});

Route::group(['prefix' => 'persuratan'], function () {
    Route::get('/', [PersuratanController::class, 'index']);
});

Route::group(['prefix' => 'rt'], function () {
    Route::get('/', [RtController::class, 'index']);
});

Route::get('/admin', function () {
    return view('admin.index');
});
