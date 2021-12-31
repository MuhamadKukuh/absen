<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\absenController;

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

// Route::get('/', function () {
//     return view('absensi');
// });

Route::get('/', [absenController::class, 'index']);
Route::post('/absen', [absenController::class, 'insert']);
Route::get('/recapt/absen/{kelas:kelas}', [absenController::class, 'show']);
Route::get('/list/absen/{class:kelas}', [absenController::class, 'dor']);
Route::get('/absen/{date:date}/{class:parameter}', [absenController::class, 'der']);
