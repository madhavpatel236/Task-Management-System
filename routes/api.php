<?php

use App\Http\Controllers\ManagerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::apiResource('managers', ManagerController::class);

Route::get('manager/{id}', function ($id) {
    $managerController = new ManagerController();
    return $managerController->getManagerHome($id);
})->name('managerHome');
