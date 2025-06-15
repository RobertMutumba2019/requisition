<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ApproveDashboard;

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
    Route::get('/approve', [ApproveDashboard::class, 'approves'])->name('approve');
   
    //Password change
  //Route::middleware(['auth.custom'])->group(function () {
    Route::get('/change', [AuthController::class, 'showChangePasswordForm'])->name('change');
    Route::post('/update', [AuthController::class, 'changePassword'])->name('update');
  //});
    Route::get('/new', function () {
        return view('dashboard.new');
    })->name('new');

    Route::get('/draft', function () {
        return view('dashboard.draft');
    })->name('draft');

    
    Route::get('/approved', function () {
        return view('dashboard.approved');
    })->name('approved');

    Route::get('/pending', function () {
        return view('dashboard.pending');
    })->name('pending');

    Route::get('/rejected', function () {
        return view('dashboard.rejected');
    })->name('rejected');


    Route::get('/approved', function () {
        return view('dashboard.approved');
    })->name('approved');


     Route::get('/audit', function () {
        return view('dashboard.audit');
    })->name('audit');

     Route::get('/branches', function () {
        return view('dashboard.branches');
    })->name('branches');

    Route::get('/group', function () {
        return view('dashboard.group');
    })->name('group');

    Route::get('/department', function () {
        return view('dashboard.department');
    })->name('department');

     Route::get('/designation', function () {
        return view('dashboard.designation');
    })->name('designation');

     Route::get('/my', function () {
        return view('dashboard.my');
    })->name('my');

     Route::get('/Right', function () {
        return view('dashboard.Right');
    })->name('Right');

     Route::get('/Role', function () {
        return view('dashboard.Role');
    })->name('Role');

     Route::get('/users', function () {
        return view('dashboard.users');
    })->name('users');


    