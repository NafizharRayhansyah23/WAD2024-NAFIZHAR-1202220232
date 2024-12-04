<?php

use App\Http\Controllers\dosenController;
use App\Http\Controllers\mahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layouts.app'); 
})->name('home');




Route::prefix('dosens')->group(function () {
    Route::get('/', [dosenController::class, 'index'])->name('dosens.index'); 
    Route::get('/create', [dosenController::class, 'getCreateForm'])->name('dosens.create'); 
    Route::post('/', [dosenController::class, 'store'])->name('dosens.store'); 
    Route::get('/{id}', [dosenController::class, 'show'])->name('dosens.show'); 
    Route::get('/{id}/edit', [dosenController::class, 'getEditForm'])->name('dosens.edit'); 
    Route::put('/{id}', [dosenController::class, 'update'])->name('dosens.update'); 
    Route::delete('/{id}', [dosenController::class, 'destroy'])->name('dosens.destroy');
});


Route::prefix('mahasiswas')->group(function () {
    Route::get('/', [mahasiswaController::class, 'index'])->name('mahasiswas.index'); 
    Route::get('/create', [mahasiswaController::class, 'getCreateForm'])->name('mahasiswas.create'); 
    Route::post('/', [mahasiswaController::class, 'store'])->name('mahasiswas.store'); 
    Route::get('/{id}', [mahasiswaController::class, 'show'])->name('mahasiswas.show'); 
    Route::get('/{id}/edit', [mahasiswaController::class, 'getEditForm'])->name('mahasiswas.edit'); 
    Route::put('/{id}', [mahasiswaController::class, 'update'])->name('mahasiswas.update'); 
    Route::delete('/{id}', [mahasiswaController::class, 'destroy'])->name('mahasiswas.destroy'); 
});

