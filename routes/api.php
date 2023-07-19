<?php

use App\Http\Controllers\OlahragaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\SkorController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// Route::get('customer', [\App\Http\Controllers\Api\CustController::class,'index']);
//Route::post('customer/post', [\App\Http\Controllers\Api\CustController::class,'store']);


Route::group(['prefix' => 'v1'], function () {
    Route::get('olahraga', [OlahragaController::class, 'index'])->middleware('auth:sanctum');
    Route::post('olahraga/{id}', [OlahragaController::class, 'store'])->middleware('auth:sanctum');
    Route::patch('olahraga/{id}', [OlahragaController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('olahraga/{id}', [OlahragaController::class, 'delete'])->middleware('auth:sanctum');

    Route::get('jadwal', [JadwalController::class, 'index'])->middleware('auth:sanctum');
    Route::post('jadwal/{id}', [JadwalController::class, 'store'])->middleware('auth:sanctum');
    Route::patch('jadwal/{id}', [JadwalController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('jadwal/{id}', [JadwalController::class, 'delete'])->middleware('auth:sanctum');

    Route::get('skor', [SkorController::class, 'index'])->middleware('auth:sanctum');
    Route::post('skor/{id}', [SkorController::class, 'store'])->middleware('auth:sanctum');
    Route::patch('skor/{id}', [SkorController::class, 'update'])->middleware('auth:sanctum');
    Route::delete('skor/{id}', [SkorController::class, 'delete'])->middleware('auth:sanctum');
});
Route::post('/register', [AuthController::class, 'registrasi']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
