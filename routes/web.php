<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function (){
    return view('auth/login');
});

Route::get('/welcome', function (){
    return view('welcome');
});

Route::get('/register', function (){
    return view('auth/register');
});