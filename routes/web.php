<?php

use App\Http\Controllers\AgeController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
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

Route::get('/', [AuthenticatedSessionController::class, 'checkLogin']);

Route::get('/dashboard', function () {
    return view('modules.backend.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::simpleResource('users', UserController::class);
    Route::get('ages', [AgeController::class, 'index'])->name('age.index');
    Route::get('ages/create', [AgeController::class, 'create'])->name('age.create');
    Route::post('ages/store', [AgeController::class, 'store'])->name('age.store');
    Route::get('ages/{id}/edit', [AgeController::class, 'edit'])->name('age.edit');
    Route::put('ages/{id}/update', [AgeController::class, 'update'])->name('age.update');
});

require __DIR__.'/auth.php';
