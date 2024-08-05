<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\Attendance\ImportAttendanceController;

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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/home', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
    
    Route::resource('users', UserController::class)->except('show', 'update', 'create');
    Route::resource('posts', App\Http\Controllers\Admin\PostController::class)->except('show', 'update', 'create');

    Route::prefix('authorization')->as('authorization.')->group(function(){
        Route::resource('role', App\Http\Controllers\Admin\Authorization\RoleController::class)->except('update', 'create');
        Route::post('role-permission/{id}', App\Http\Controllers\Admin\Authorization\RolePermissionController::class)->name('role-permission');
        Route::resource('permission', App\Http\Controllers\Admin\Authorization\PermissionController::class)->except('show', 'update', 'create');
    });
});



