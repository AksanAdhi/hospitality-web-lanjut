<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});

// Route Login
Route::middleware('redirect.if.authenticated')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});



// Rute Register
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Rute LogOut
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Home Route
Route::get('/home', function() {
    // Redirect to the home page or return a view
    return view('home');
});

// Rute untuk navbar
Route::get('/admin/home', function () {
    return view('home', ['title' => 'Home']);
});
Route::get('/admin/appointment', function () {
    return view('appointment', ['title' => 'Janji Temu Dokter']);
});
Route::get('/admin/obat', function () {
    return view('obat', ['title' => 'Manajemen Obat']);
});
Route::get('/admin/pasien', function () {
    return view('pasien', ['title' => 'Pasien']);
});

