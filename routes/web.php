<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/client/listes-clients', [ClientController::class, 'index'])->name('client.index');
});

Route::get('/client/ajout-client', [ClientController::class, 'create'])->name('client.create');
Route::post('/client', [ClientController::class, 'store'])->name('client.store');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/client/{client}/edit', [ClientController::class, 'edit'])->name('client.edit');
    Route::put('/client/{client}', [ClientController::class, 'update'])->name('client.update');
    Route::delete('/client/{client}', [ClientController::class, 'destroy'])->name('client.destroy');
    Route::patch('/client/{id}', [ClientController::class, 'restore'])->name('client.restore');
    Route::get('/client/listes-clients-supprimés', [ClientController::class, 'indexTrashed'])->name('client.trashed');
});


require __DIR__.'/auth.php';