<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return view('welcome');
});

/* === Auth === */

Route::get('/auth/login', [AuthController::class, 'accessLogin'])->name('auth.login');
Route::get('/auth/register', [AuthController::class, 'accessRegister'])->name('auth.register');
Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');

