<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\Room\RoomController;
use App\Http\Controllers\Admin\Todo\TodoController;
use App\Http\Controllers\Admin\Vendor\VendorController;
use App\Http\Controllers\Admin\Expense\ExpenseController;
use App\Http\Controllers\Admin\Property\PropertyController;
use App\Http\Controllers\Admin\HouseChore\HouseChoreController;
use App\Http\Controllers\Admin\RentManagement\RentManagementController;




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
Route::resource('expenses', ExpenseController::class);
Route::resource('rent_managements', RentManagementController::class);
Route::resource('rooms', RoomController::class);













