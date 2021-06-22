<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\UserController;
  
Route::resource('users', UserController::class);

use App\Http\Controllers\RoleController;
  
Route::resource('roles', RoleController::class);

use App\Http\Controllers\ActivityController;
  
Route::resource('activities', ActivityController::class);

use App\Http\Controllers\UserActivityController;
  
Route::resource('useractivities', UserActivityController::class);

