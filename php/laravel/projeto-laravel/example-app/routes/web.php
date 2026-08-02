<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TesteController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/teste', [TesteController::class, 'index'])->name('teste.index');
Route::post('/teste', [TesteController::class, 'store'])->name('teste.store');

Route::get('/teste/{id}', [TesteController::class, 'show'])->name('teste.show');
Route::post('/teste/update', [TesteController::class, 'update'])->name('teste.update');

Route::delete('/teste/{id}', [TesteController::class, 'destroy'])->name('teste.destroy');