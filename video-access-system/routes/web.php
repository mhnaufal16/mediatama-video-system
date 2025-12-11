<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/customers', [App\Http\Controllers\AdminController::class, 'index'])->name('customers.index');
    Route::post('/customers', [App\Http\Controllers\AdminController::class, 'store'])->name('customers.store');
    Route::put('/customers/{user}', [App\Http\Controllers\AdminController::class, 'update'])->name('customers.update');
    Route::delete('/customers/{user}', [App\Http\Controllers\AdminController::class, 'destroy'])->name('customers.destroy');

    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('videos', App\Http\Controllers\VideoController::class);
    Route::resource('access-requests', App\Http\Controllers\AccessRequestController::class)->only(['index', 'update']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/videos', [App\Http\Controllers\CustomerController::class, 'index'])->name('videos.index');
    Route::post('/videos/{video}/request', [App\Http\Controllers\CustomerController::class, 'requestAccess'])->name('videos.request');
    Route::get('/videos/{video}/watch', [App\Http\Controllers\CustomerController::class, 'watch'])->name('videos.watch');
});
