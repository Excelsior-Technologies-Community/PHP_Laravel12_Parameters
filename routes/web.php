<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Laravel 12 Parameter Demonstration Routes
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Existing Parameter Examples
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


/*
|--------------------------------------------------------------------------
| NEW FUNCTIONALITIES
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| 8. Parameter Dashboard
|--------------------------------------------------------------------------
*/

Route::get(
    '/parameter-dashboard',
    [UserController::class, 'dashboard']
)->name('parameter.dashboard');


/*
|--------------------------------------------------------------------------
| 9. Advanced User Search
|--------------------------------------------------------------------------
*/

Route::get(
    '/users',
    [UserController::class, 'users']
)->name('users.index');


/*
|--------------------------------------------------------------------------
| 10. Edit User Using Route Parameter
|--------------------------------------------------------------------------
*/

Route::get(
    '/user-edit/{id}',
    [UserController::class, 'editUser']
)->whereNumber('id')
    ->name('users.edit');


/*
|--------------------------------------------------------------------------
| 11. Update User Using Route Parameter
|--------------------------------------------------------------------------
*/

Route::put(
    '/user-update/{id}',
    [UserController::class, 'updateUser']
)->whereNumber('id')
    ->name('users.update');


/*
|--------------------------------------------------------------------------
| 12. Delete User Using Route Parameter
|--------------------------------------------------------------------------
*/

Route::delete(
    '/user-delete/{id}',
    [UserController::class, 'deleteUser']
)->whereNumber('id')
    ->name('users.delete');


/*
|--------------------------------------------------------------------------
| 13. JSON User Parameter
|--------------------------------------------------------------------------
*/

Route::get(
    '/api/parameter/user/{id}',
    [UserController::class, 'userJson']
)->whereNumber('id')
    ->name('users.json');