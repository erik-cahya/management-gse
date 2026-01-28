<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GSEController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleCheckupController;
use App\Http\Controllers\ViolationController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('gse/search', [GSEController::class, 'search'])->name('gse.search');
    Route::post('gse/search', [GSEController::class, 'getSearchData'])->name('gse.searchData');

    Route::resource('/gse', GSEController::class);
    Route::resource('/violation', ViolationController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/checkup', VehicleCheckupController::class);
});

require __DIR__ . '/auth.php';

// route::get('/admin/dashboard', function () {
//     return view('admin-panel/dashboard/index');
// });
