<?php

use App\Http\Controllers\KendaraanController;
use Illuminate\Support\Facades\Route;


Route::get('/', [KendaraanController::class, 'index'])->name('dashboard');
Route::get('/create', [KendaraanController::class, 'create']);
Route::post('/store', [KendaraanController::class, 'store'])->name('store');
Route::delete('/{kendaraan}', [KendaraanController::class, 'destroy']) ;
Route::get('/{kendaraan}/edit', [KendaraanController::class, 'edit'])->name('edit-kendaraan');

Route::put('/{kendaraan}', [KendaraanController::class, 'update'])->name('edit-kendaraan');