<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::get('/', function () {
    return redirect()->route('auth.accessLogin') ;
});


/* === Acesso restrito de sessão === */

Route::middleware(['authCheck'])->group(function () {

    Route::prefix('auth')->group(function () {
        Route::name('auth.')->group(function () {
            Route::get('/register', [AuthController::class, 'accessRegister'])->name('accessRegister');
            Route::get('/login', [AuthController::class, 'accessLogin'])->name('accessLogin');
        });
    });

    Route::get('/welcome', [AuthController::class, 'accessWelcome'])->name('welcome');

});


/* === Validações === */

Route::post('/auth/save', [AuthController::class, 'save'])->name('auth.save');

Route::post('/auth/check', [AuthController::class, 'check'])->name('auth.check');

Route::get('/auth/logout', [AuthController::class, 'logout'])->name('auth.logout');


