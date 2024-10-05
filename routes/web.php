<?php

use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/', [KendaraanController::class, 'index'])->name('dashboard');
    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('dashboard');
    
    Route::get('/create', [KendaraanController::class, 'create']);
    Route::post('/store', [KendaraanController::class, 'store'])->name('store');
    Route::delete('/{kendaraan}', [KendaraanController::class, 'destroy']) ;
    Route::get('/{kendaraan}/edit', [KendaraanController::class, 'edit'])->name('edit-kendaraan');
    
    Route::put('/{kendaraan}', [KendaraanController::class, 'update'])->name('edit-kendaraan');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';