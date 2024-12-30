<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\AssignPermissionController;
use App\Http\Controllers\Admin\RolePermission\RoleController;
use App\Http\Controllers\Admin\RolePermission\RolePermissionController;

use Inertia\Inertia;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/admin-login', function () {
    return view('auth.login');
});


Route::get('/', function () {
    return Inertia::render('home/home-index');

});



Auth::routes();
// Route::resource('/roles', RolePermissionController::class);

Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');


Route::get('/user/password-change', [UserController::class, 'passwordChange'])->name('user.pass.change');
Route::post('/user/password-reset', [UserController::class, 'passwordReset'])->name('user.pass.reset');


Route::get('dashboard/superadmin', [SuperAdminController::class, 'home'])->name('superadmin.home');



Route::group(['as'=>'roles.', 'prefix'=>'roles'], function(){
    
    Route::get('/', [RoleController::class, 'index'])->name('index');
    Route::post('/', [RoleController::class, 'store'])->name('store');
    Route::get('/{id}/show', [RoleController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [RoleController::class, 'edit'])->name('edit');
    Route::put('/{id}', [RoleController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [RoleController::class, 'delete'])->name('delete');

});
Route::group(['as'=>'permissions.', 'prefix'=>'permissions'], function(){
    Route::get('/', [PermissionController::class, 'index'])->name('index');
    Route::post('/', [PermissionController::class, 'store'])->name('store');
    Route::get('/{id}/show', [PermissionController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [PermissionController::class, 'delete'])->name('delete');

});
Route::group(['as'=>'assign-permissions.', 'prefix'=>'assign-permissions'], function(){
    Route::get('/{role_id}', [AssignPermissionController::class, 'index'])->name('index');
    Route::post('/', [AssignPermissionController::class, 'store'])->name('store');
   
});
Route::group(['as'=>'permissions.', 'prefix'=>'permissions'], function(){
    Route::get('/', [PermissionController::class, 'index'])->name('index');
    Route::post('/', [PermissionController::class, 'store'])->name('store');
    Route::get('/{id}/show', [PermissionController::class, 'show'])->name('show');
    Route::get('/{id}/edit', [PermissionController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PermissionController::class, 'update'])->name('update');
    Route::delete('/{id}/delete', [PermissionController::class, 'delete'])->name('delete');

});





