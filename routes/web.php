<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserActivityController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);  
Route::resource('activities', ActivityController::class);  
Route::resource('useractivities', UserActivityController::class);

Route::get('/planning/{id}', [
    'uses' => 'App\Http\Controllers\UserActivityController@show_planning'
]);
