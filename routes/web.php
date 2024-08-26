<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::middleware('guest')->group(function () {
    Route::resource('login', LoginController::class)->only(['index', 'store']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('welcome')->name('admin.dashboard');
    });
});
