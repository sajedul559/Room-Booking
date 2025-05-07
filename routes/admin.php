<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\Room\RoomController;
use App\Http\Controllers\Admin\Todo\TodoController;
use App\Http\Controllers\GeneralSettingsController;
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

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\HomeController::class, 'home'])->name('dashboard');

    Route::resource('properties', PropertyController::class);
    Route::resource('admins', UserController::class);
    Route::resource('vendors', VendorController::class);
    Route::post('/vendors/change-status', [VendorController::class, 'changeStatus'])->name('vendor.changeStatus');

    Route::resource('house_chores', HouseChoreController::class);
    Route::resource('todos', TodoController::class);
    Route::resource('expenses', ExpenseController::class);
    Route::resource('rent_managements', RentManagementController::class);
    Route::get('rent-managements/calender',[RentManagementController::class, 'calender'])->name('rent.calender');
    Route::get('/rent-calendar/events', [RentManagementController::class, 'getRentEvents'])->name('rent_calendar.events');

    Route::resource('rooms', RoomController::class);
    Route::get('/get-rooms-by-property', [RoomController::class, 'getRoomsByProperty'])->name('get.rooms.by.property');


    Route::get('/api/expense-data/{month}', [HomeController::class, 'getExpenseData']);
    Route::get('/api/income-data/{month}', [HomeController::class, 'getIncomeData']);
    //GET USER EXPENSE DETAILS
    Route::get('/expense/details/{user_id}', [ExpenseController::class, 'userExpenseDetails'])->name('expense.details');
    Route::get('expense/filter', [ExpenseController::class, 'filter'])->name('expense.filter');
    Route::get('data/filter', [ExpenseController::class, 'filter'])->name('data.filter');

    Route::get('rent/filter', [RentManagementController::class, 'filter'])->name('rent.filter');

    Route::get('/fetch-chart-data', [HomeController::class, 'fetchData'])->name('fetch.chart.data');


});


Route::group(['as'=>'settings.', 'prefix'=>'settings'], function(){
    
    Route::get('/general', [GeneralSettingsController::class, 'index'])->name('general');
    Route::post('/general', [GeneralSettingsController::class, 'store'])->name('general.store');
   
});













