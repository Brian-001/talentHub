<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/home', [AdminController::class, 'home'])->name('admin.home');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
});

Route::prefix('employee')->group(function(){
    Route::get('/dashboard', [EmployeeController::class, 'index'])->name('employee.dashboard');
});

Route::prefix('employer')->group(function(){
    Route::get('/dashboard', [EmployerController::class, 'index'])->name('employer.dashboard');
    Route::get('/home', [EmployerController::class, 'home'])->name('employer.employerdashboard-home');
    Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.employerdashboard-profile');
});
