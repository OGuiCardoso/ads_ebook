<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{registerController, ErrorController, HomeController};
use App\Http\Middleware\ValidateRequestData;

Route::get('/', [HomeController::class, 'showHome'])->name('app.homepage');

Route::get('/register', [registerController::class, 'show_form'])->name('app.register');
Route::get('/register/{estadoSigla}', [registerController::class, 'buscar_cidade'])->name('app.register.cidade');

Route::post('/register', [registerController::class, 'register'])
->name('app.register.submit')
->middleware(ValidateRequestData::class);

Route::get('/app/error', [ErrorController::class, 'show_error'])->name('app.error');



