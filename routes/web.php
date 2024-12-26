<?php

use App\Http\Controllers\AgeCategoryController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitCategoryController;
use App\Http\Controllers\PriceCategoryController;
use App\Http\Controllers\PromoController;

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
    Route::resource('unit-categories', UnitCategoryController::class);
    Route::resource('price-categories', PriceCategoryController::class);
    Route::resource('age-categories', AgeCategoryController::class);
    Route::resource('promos', PromoController::class);
});

require __DIR__.'/auth.php';
