<?php

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
    return view('index');
});

Route::group(['prefix' => 'informasi'], function() {
    Route::get('/', function () {
        return view('informasi.detail');
    });
});

Route::group(['prefix' => 'bansos'], function () {
    Route::get('/', function () {
        return view('bansos.index');
    });
});

Route::group(['prefix' => 'persuratan'], function () {
    Route::get('/', function () {
        return view('persuratan.index');
    });
});

Route::group(['prefix' => 'rt'], function () {
    Route::get('/', function () {
        return view('rt.index');
    });
});
