<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/news', function () {
    return view('news');
});

Route::get('/form', [App\Http\Controllers\RegistrationController::class, 'index']);
Route::post('/form', [App\Http\Controllers\RegistrationController::class, 'store']);
Route::get('/DataTable', [App\Http\Controllers\RegistrationController::class, 'DataTable']);