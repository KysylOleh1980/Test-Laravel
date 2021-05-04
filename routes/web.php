<?php

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

use App\Http\Controllers\Deal\DealController;
use App\Http\Controllers\Token\TokenController;
use App\Http\Controllers\Task\TaskController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/create', [DealController::class, 'create']);
Route::post('/save', [DealController::class, 'save']);


Route::get('assign', [TaskController::class, 'assign']);
Route::post('/savetask', [TaskController::class, 'savetask']);


Route::get('/token', [TokenController::class, 'token']);





