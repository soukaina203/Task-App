<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('tasks', [TaskController::class, 'index']);
Route::post('tasks', [TaskController::class, 'store']);
Route::get('tasks/{task}', [TaskController::class, 'show']);
Route::put('tasks/{task}', [TaskController::class, 'update']);
Route::delete('tasks/{task}', [TaskController::class, 'destroy']);
Route::get('category/{category}/tasks', [TaskController::class, "getTaskByCategory"]);
Route::get('search/{term}/tasks', [TaskController::class, ' getTaskByTerm']);
Route::get('order/{column}/{direction}/task',[TaskController::class, 'getTaskOrderBy']);

