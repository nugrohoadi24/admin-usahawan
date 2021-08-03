<?php

use App\Http\Controllers\PelaporController;
use App\Http\Controllers\PemohonController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'App\Http\Controllers\DashboardController@index');

Route::resource('laporan', PelaporController::class);
Route::resource('permohonan', PemohonController::class);

Route::resource('verifikasi-laporan', 'App\Http\Controllers\PelaporController@verifikasi');

Route::get('laporan/{id}/details', 'App\Http\Controllers\PelaporController@detail')
    ->name('laporan.detail');
Route::get('permohonan/{id}/details', 'App\Http\Controllers\PemohonController@detail')
    ->name('permohonan.detail');

Route::get('laporan/{id}/set-status', 'App\Http\Controllers\PelaporController@setStatus')
    ->name('laporan.status');
Route::get('permohonan/{id}/set-status', 'App\Http\Controllers\PemohonController@setStatus')
    ->name('permohonan.status');