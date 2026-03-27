<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// 1. Single Required Parameter
Route::get('/user/{id}', [UserController::class, 'getUser']);

// 2. Optional Parameter (Sath ma '?' nishani jaruri che)
Route::get('/profile/{name?}', [UserController::class, 'getProfile']);

// 3. Multiple Parameters
Route::get('/post/{post}/comment/{comment}', [UserController::class, 'postComment']);

// 4. Parameter with Validation (Fakt number j aavva joie)
Route::get('/product/{id}', function ($id) {
    return "Product ID: " . $id;

    Route::get('/profile/{name?}', [UserController::class, 'showProfile']);
})->whereNumber('id');