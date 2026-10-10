<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DepartmentController;

// -------------------------------------------------------------
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

// -------------------------------------------------------------
Route::middleware('auth')->group(function () {
    
    Route::get('/', function () {
        return redirect()->route('students.index');
    });
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::resource('students', StudentController::class);
    Route::resource('departments', DepartmentController::class);
});