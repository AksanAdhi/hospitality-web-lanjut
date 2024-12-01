<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

/*
|---------------------------------------------------------------------------
| Web Routes
|---------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
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
Route::get('/admin/appointment', function () {
    return view('appointment', ['title' => 'Janji Temu Dokter']);
});
Route::get('/admin/obat', function () {
    return view('obat', ['title' => 'Manajemen Obat']);
});
Route::get('/admin/pasien', function () {
    return view('pasien', ['title' => 'Pasien']);
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

// Middleware untuk admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/home', [AdminController::class, 'home'])->name('admin.home');
    Route::resource('/admin/patients', PatientController::class);
    Route::resource('/admin/inventory', InventoryController::class);
    Route::resource('/admin/appointments', AppointmentController::class);
    Route::resource('/admin/inventory', InventoryController::class);
    Route::get('/admin/inventory/create', [InventoryController::class, 'create'])->name('admin.inventory.create');

    // Rute untuk halaman Pelajari Lebih Lanjut
    Route::get('/admin/learn-more', function () {
        return view('admin.learn-more', ['title' => 'Pelajari Lebih Lanjut']);
    })->name('admin.learn-more');

    // Route About
    Route::get('/admin/about', function () {
        return view('admin.about', ['title' => 'Tentang Sistem']);
    })->name('admin.about');
});

// Route untuk dokter
Route::middleware(['auth', 'role:user'])->group(function () {

    Route::get('/doctor/patients', [PatientController::class, 'indexForDoctor'])->name('doctor.patients.index');

    Route::get('/profile', [DoctorController::class, 'editProfile'])->name('doctor.profile.edit');
    Route::post('/profile', [DoctorController::class, 'updateProfile'])->name('doctor.profile.update');
    // Halaman untuk ubah password
    Route::get('/password/change', [DoctorController::class, 'showChangePasswordForm'])->name('doctor.password.change');
    Route::post('/password/change', [DoctorController::class, 'updatePassword'])->name('doctor.password.update');


    Route::get('/home', [DoctorController::class, 'home'])->name('doctor.home');
    Route::get('/patients/{id}', [DoctorController::class, 'viewPatient'])->name('doctor.patients.show');
    Route::get('/appointments', [DoctorController::class, 'appointments'])->name('doctor.appointments.index');
    Route::get('doctor/appointments/{appointment}', [AppointmentController::class, 'showForDoctor'])->name('doctor.appointments.show');
});
