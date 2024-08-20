<?php

use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

// Rute untuk user biasa
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rute untuk admin
Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.dashboard')->middleware(['auth', 'admin']);
