<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('app.homepage');
})->name('app.homepage');

Route::get('/register', function(){
    return view('app.register');
})->name('app.register');
