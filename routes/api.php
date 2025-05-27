<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('manager', ManagerController::class);

Route::get('managers/{id}', function ($id) {
    $managerController = new ManagerController();
    return $managerController->getUser($id);
})->name('managerHome');
