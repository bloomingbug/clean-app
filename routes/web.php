<?php

use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\CleanActController as AdminCleanActController;
use App\Http\Controllers\Admin\CleanFundController as AdminCleanFundController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\CleanActController;
use App\Http\Controllers\User\CleanFundController;
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

Route::get('/cleanfund', [CleanFundController::class, 'index'])->name('cleanfund.index');
Route::post('/cleanfund', [CleanFundController::class, 'store'])->name('cleanfund.store')->middleware('auth');
// Route::post('/webhook', [CleanFundController::class, 'update'])->name('cleanfund.update');

Route::get('/cleanact', [CleanActController::class, 'index'])->name('cleanact.index');

Route::get('/province/{id}', [ProvinceController::class, 'show'])->name('province.show');

Route::middleware('guest')->group(function () {
    Route::resource('login', LoginController::class)->only(['index', 'store']);
    Route::resource('register', RegisterController::class)->only(['index', 'store']);
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return redirect()->route('admin.dashboard');
    });

    Route::get('dashboard', function () {
        return view('welcome')->name('admin.dashboard');
    });

    Route::get('permission', [PermissionController::class, 'index'])->name('admin.permission.index');

    Route::resource('role', RoleController::class, ['as' => 'admin', 'except' => ['show']]);
    Route::resource('user', UserController::class, ['as' => 'admin', 'except' => ['show']]);

    Route::put('campaign/{campaign}/approve', [CampaignController::class, 'approve'])->name('admin.campaign.approve');
    Route::resource('campaign', CampaignController::class, ['as' => 'admin', 'except' => ['show']]);

    Route::get('/fund/{campaign}/edit', [AdminCleanFundController::class, 'edit'])->name('admin.cleanfund.edit');
    Route::put('/fund/{campaign}', [AdminCleanFundController::class, 'update'])->name('admin.cleanfund.update');

    Route::get('/act/{campaign}/edit', [AdminCleanActController::class, 'edit'])->name('admin.cleanact.edit');
    Route::put('/act/{campaign}', [AdminCleanActController::class, 'update'])->name('admin.cleanact.update');
});
