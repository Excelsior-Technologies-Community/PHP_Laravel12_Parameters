<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Laravel Parameter Demonstration Routes
|--------------------------------------------------------------------------
*/


// 1. Single Required Parameter
Route::get('/user/{id}', [UserController::class, 'getUser'])
    ->whereNumber('id');


// 2. Optional Parameter
Route::get('/profile/{name?}', [UserController::class, 'getProfile']);


// 3. Multiple Parameters
Route::get(
    '/post/{post}/comment/{comment}',
    [UserController::class, 'postComment']
);


// 4. Dynamic User Profile By ID
Route::get(
    '/user-profile/{id}',
    [UserController::class, 'showUser']
)->whereNumber('id');


// 5. User Search Using Route Parameter
Route::get(
    '/users/search/{name}',
    [UserController::class, 'searchUsers']
);


// 6. Product Parameter With Numeric Constraint
Route::get(
    '/product/{id}',
    [UserController::class, 'showProduct']
)->whereNumber('id');


// 7. Optional Profile Parameter
Route::get(
    '/member/{name?}',
    [UserController::class, 'showProfile']
);