<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::redirect('/', '/Login');

Route::get('/Login', [LoginController::class, 'loginView'])->name('loginView');
Route::post('/Login', [LoginController::class, 'authentication'])->name('loginAuth');

Route::resource('/admin', AdminController::class);
