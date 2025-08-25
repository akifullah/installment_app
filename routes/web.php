<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.dashboard');
})->name("dashboard");


Route::resource('/users', UserController::class);
Route::resource('/customers', CustomerController::class);