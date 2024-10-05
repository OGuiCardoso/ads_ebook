<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{registerController, ErrorController};
// use Symfony\Component\HttpKernel\Controller\ErrorController;

Route::get('/', function () {
    return view('app.homepage');
})->name('app.homepage');

Route::get('/register', [registerController::class, 'show_form'])->name('app.register');
Route::get('/register/{estadoSigla}', [registerController::class, 'buscar_cidade'])->name('app.register.cidade');

Route::post('/register', [registerController::class, 'register'])->name('app.register.submit');

Route::get('/app/error', [ErrorController::class, 'show_error'])->name('app.error');



