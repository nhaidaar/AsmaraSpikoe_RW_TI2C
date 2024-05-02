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
    return view('home');
});
Route::get('/bansos', function () {
    return view('bansos');
});

Route::get('/persuratan', function () {
    return view('persuratan');
});

Route::get('/rukuntetangga', function () {
    return view('rukuntetangga');
});