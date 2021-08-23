<?php

use App\Http\Controllers\API\LaporanController;
use App\Http\Controllers\API\PermohonanController;
use App\Http\Controllers\API\WilayahController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('laporan', [LaporanController::class, 'laporan']);
Route::post('permohonan', [PermohonanController::class, 'permohonan']);
Route::get('provinsi', [WilayahController::class, 'provinsi']);
Route::get('kabkota', [WilayahController::class, 'kabkota']);
Route::get('kecamatan', [WilayahController::class, 'kecamatan']);
Route::get('kelurahan', [WilayahController::class, 'kelurahan']);

