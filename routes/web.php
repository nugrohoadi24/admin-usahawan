<?php

use App\Http\Controllers\PelaporController;
use App\Http\Controllers\PemohonController;
use App\Mail\MyTestMail;
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

Route::get('/', 'App\Http\Controllers\DashboardController@index')
    ->name('dashboard');

Route::resource('laporan', PelaporController::class);
Route::resource('permohonan', PemohonController::class);

Route::get('verifikasi-laporan', 'App\Http\Controllers\PelaporController@verifikasi')
    ->name('laporan.verifikasi');
Route::get('verifikasi-permohonan', 'App\Http\Controllers\PemohonController@verifikasi')
    ->name('permohonan.verifikasi');

Route::get('laporan/{id}/details', 'App\Http\Controllers\PelaporController@detail')
    ->name('laporan.detail');
Route::get('permohonan/{id}/details', 'App\Http\Controllers\PemohonController@detail')
    ->name('permohonan.detail');

Route::get('laporan/{id}/set-status', 'App\Http\Controllers\PelaporController@setStatus')
    ->name('laporan.status');
Route::get('permohonan/{id}/set-status', 'App\Http\Controllers\PemohonController@setStatus')
    ->name('permohonan.status');

Route::get('laporan/download_primary/{id}', 'App\Http\Controllers\PelaporController@download_primary')
    ->name('laporan.download_primary');

Route::get('laporan/download_secondary/{id}', 'App\Http\Controllers\PelaporController@download_secondary')
    ->name('laporan.download_secondary');

Route::get('send-mail', 'App\Http\Controllers\PelaporController@sendEmail');