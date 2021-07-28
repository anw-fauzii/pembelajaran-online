<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\TahunAjaranController;

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

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () { 
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::middleware(['auth:sanctum', 'verified'])->get('kehadiran', [AbsenController::class, 'index'])->name('kehadiran');
    Route::post('absen/harian', [AbsenController::class, 'harian'])->name('harian');
    Route::post('absen/mapel', [AbsenController::class, 'mapel'])->name('absenMapel');
    Route::get('forum', [AbsenController::class, 'forum'])->name('forum');
    Route::resource('mapel', MapelController::class);
    Route::resource('jurusan', JurusanController::class);
    Route::resource('guru', GuruController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('jadwal', JadwalController::class);
    Route::resource('ajaran', TahunAjaranController::class);
    Route::resource('materi', MateriController::class);  
    Route::resource('tugas', TugasController::class);
    Route::get('tugas/{materi_id}/{jadwal_id}',[TugasController::class,'index'])->name('tugas.detail');
    Route::get('bimbingan/{id}',[TugasController::class,'show'])->name('bimbingan');
    Route::post('siswa/import',[SiswaController::class,'import_excel'])->name('siswa.import');
    Route::get('jadwal/lihat',[JadwalController::class,'filter_jadwal'])->name('jadwal.lihat');
    Route::get('nilai/lihat',[TugasController::class,'filter_nilai'])->name('tugas.nilai');
});