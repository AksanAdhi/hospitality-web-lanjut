<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\loginController;
use App\Http\Controllers\Auth\registerController;


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
// Rute Login
Route::get('/login', [loginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [loginController::class, 'login']);

// Rute Register
Route::get('/register', [registerController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [registerController::class, 'register']);

// Rute LogOut
Route::post('/logout', [loginController::class, 'logout']) ->name('logout');

// Home Route
Route::get('/home', function(){
    return view('home');
});



// Route untuk navbar

Route::get('/home', function () {
    return view('home',['title' => 'Home']);
});

Route::get('/about', function () {
    return view('about',['title' => 'About Us']);
});

Route::get('/obat', function () {
    return view('obat',['title' => 'List Obat']);
});

Route::get('/appointment', function () {
    return view('appointment',['title' => 'Jadwal pertemuan']);
});