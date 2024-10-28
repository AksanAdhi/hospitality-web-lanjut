<?php

use App\Http\Controllers\DokterController;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\JanjiController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Dokter
Route::get('/dokter/profile', [DokterController::class, 'profile']);
Route::get('/dokter/create', [DokterController::class, 'create'])->name('dokter.create');
Route::post('/dokter/store', [DokterController::class, 'store'])->name('dokter.store');
Route::get('/dokter/list', [DokterController::class, 'index'])->name('dokter.list');
Route::get('/show/{id}', [DokterController::class, 'show'])->name('dokter.show');
Route::get('/dokter', [DokterController::class, 'index']);

// Inventaris
Route::get('/inventaris/profile', [InventarisController::class, 'profile']);
Route::get('/inventaris/create', [InventarisController::class, 'create'])->name('inventaris.create');
Route::post('/inventaris/store', [InventarisController::class, 'store'])->name('inventaris.store');
Route::get('/inventaris/list', [InventarisController::class, 'index'])->name('inventaris.list');
Route::get('/show/{id}', [InventarisController::class, 'show'])->name('inventaris.show');
Route::get('/inventaris', [InventarisController::class, 'index']);

// // Janji
// Route::get('/janji/profile', [JanjiController::class, 'profile']);
// Route::get('/janji/create', [JanjiController::class, 'create'])->name('janji.create');
// Route::post('/janji/store', [JanjiController::class, 'store'])->name('janji.store');
// Route::get('/janji/list', [JanjiController::class, 'index'])->name('janji.list');
// Route::get('/show/{id}', [JanjiController::class, 'show'])->name('janji.show');
// Route::get('/janji', [JanjiController::class, 'index']);

// Pasien
Route::get('/pasien/profile', [PasienController::class, 'profile']);
Route::get('/pasien/create', [PasienController::class, 'create'])->name('pasien.create');
Route::post('/pasien/store', [PasienController::class, 'store'])->name('pasien.store');
Route::get('/pasien/list', [PasienController::class, 'index'])->name('pasien.list');
Route::get('/show/{id}', [PasienController::class, 'show'])->name('pasien.show');
Route::get('/pasien', [PasienController::class, 'index']);

// // Pengguna
// Route::get('/pengguna/profile', [PenggunaController::class, 'profile']);
// Route::get('/pengguna/create', [PenggunaController::class, 'create'])->name('pengguna.create');
// Route::post('/pengguna/store', [PenggunaController::class, 'store'])->name('pengguna.store');
// Route::get('/pengguna/list', [PenggunaController::class, 'index'])->name('pengguna.list');
// Route::get('/show/{id}', [PenggunaController::class, 'show'])->name('pengguna.show');
// Route::get('/pengguna', [PenggunaController::class, 'index']);