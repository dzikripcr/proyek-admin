<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

//routes dashboard admin controller
Route::get('/dashboard', [DashboardController::class, 'index']);
