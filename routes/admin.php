<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Todo\TodoController;
use App\Http\Controllers\Admin\Vendor\VendorController;
use App\Http\Controllers\Admin\Property\PropertyController;
use App\Http\Controllers\Admin\HouseChore\HouseChoreController;




/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::resource('properties', PropertyController::class);
Route::resource('admins', UserController::class);
Route::resource('vendors', VendorController::class);
Route::resource('house_chores', HouseChoreController::class);
Route::resource('todos', TodoController::class);













