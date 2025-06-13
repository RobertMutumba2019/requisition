<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Route::get('/', function () {
//     return view('welcome');
// });
// PUBLIC routes:
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login'])->name('login.post');

// Logout via POST (or you may allow GET but POST is recommended):
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// PROTECTED routes: apply a middleware we will create, e.g. 'auth.custom'
//Route::middleware(['auth.custom'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

   
//});
