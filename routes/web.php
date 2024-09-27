<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\registerController;

Route::get('/', function () {
    return view('app.homepage');
})->name('app.homepage');

Route::get('/register', [registerController::class, 'show_form'])->name('app.register');
Route::get('/register/{estadoSigla}', [registerController::class, 'buscar_cidade'])->name('app.register.cidade');

Route::post('/register', [registerController::class, 'register'])->name('app.register.submit');


