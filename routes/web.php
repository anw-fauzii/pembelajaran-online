<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AbsenController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('kehadiran', [AbsenController::class, 'index'])->name('kehadiran');
Route::post('absen', [AbsenController::class, 'absen'])->name('absen');
Route::get('forum', [AbsenController::class, 'forum'])->name('forum');
Route::resource('mapel', MapelController::class);
Route::resource('jurusan', JurusanController::class);