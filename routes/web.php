<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TravelingController;
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

Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Authentication Routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('login.authenticate');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

// Travel Logs Routes (CRUD)
Route::prefix('travel')->group(function () {
    Route::get('/', [TravelingController::class, 'index'])->name('travel.index');
    Route::get('/create', [TravelingController::class, 'create'])->name('travel.create');
    Route::post('/', [TravelingController::class, 'store'])->name('travel.store');
    Route::get('/{id}/view', [TravelingController::class, 'show'])->name('travel.view');
    Route::get('/{id}/edit', [TravelingController::class, 'edit'])->name('travel.edit');
    Route::put('/{id}', [TravelingController::class, 'update'])->name('travel.update');
    Route::delete('/{id}', [TravelingController::class, 'destroy'])->name('travel.destroy');
});