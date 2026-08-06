<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/usuarios', [UserController::class, 'index']);

Route::get('admin/usuarios/{user}', [UserController::class, 'show']);
