<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\CleanUpController;
use App\Http\Controllers\User\ProvinceController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [CleanUpController::class, 'index'])->name('home');
Route::get('/campaign/add', [CleanUpController::class, 'create'])->name('cleanup.create');
Route::post('/campaign/add', [CleanUpController::class, 'store'])->name('cleanup.store');
Route::get('/campaign/location', [CleanUpController::class, 'location'])->name('cleanup.location');
Route::get('/campaign/{campaign}', [CleanUpController::class, 'show'])->name('cleanup.show');
Route::put('/campaign/{campaign}/vote', [CleanUpController::class, 'vote'])->name('cleanup.vote');

Route::get('/province/{id}', [ProvinceController::class, 'show'])->name('province.show');

Route::middleware('guest')->group(function () {
    Route::resource('login', LoginController::class)->only(['index', 'store']);
    Route::resource('register', RegisterController::class)->only(['index', 'store']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('welcome')->name('admin.dashboard');
    });

    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission.index');

    Route::resource('role', RoleController::class, ['as' => 'admin', 'except' => ['show']]);
});
