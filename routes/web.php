<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('auth.accessLogin') ;
});


/* === Acesso restrito de sessão === */

Route::middleware(['authCheck'])->group(function () {
    Route::get('/auth/register', [AuthController::class, 'accessRegister'])->name('auth.accessRegister');
    Route::get('/auth/login', [AuthController::class, 'accessLogin'])->name('auth.accessLogin');
    Route::get('/welcome', [AuthController::class, 'accessWelcome'])->name('welcome');
});


/* === Validações === */

Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');
Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');
Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


