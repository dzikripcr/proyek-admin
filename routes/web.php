<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\UsersAdminController;
use App\Http\Controllers\WargaAdminController;
use App\Http\Controllers\ProyekAdminController;
use App\Http\Controllers\DashboardAdminController;

//routes ke halaman login
Route::get('/', function () {
    return view('pages.login');
});

// Warga Admin Routes
Route::resource('warga-admin', WargaAdminController::class);

// Proyek Admin Routes
Route::resource('proyek-admin', ProyekAdminController::class);

// Warga Guest Routes
Route::resource('warga-guest', WargaController::class);

// Proyek Guest Routes
Route::resource('proyek-guest', ProyekController::class);

//Dashboard Admin Routes
Route::resource('dashboard-admin', DashboardAdminController::class);

//users admin routes
Route::resource('user-admin', UsersAdminController::class);

// Auth Admin Routes
Route::get('/admin/login', [AuthAdminController::class, 'index'])->name('login');
Route::post('/admin/login', [AuthAdminController::class, 'login'])->name('admin.login');
Route::get('/admin/register', [AuthAdminController::class, 'regis'])->name('register');
Route::post('/admin/register', [AuthAdminController::class, 'register'])->name('admin.register');


