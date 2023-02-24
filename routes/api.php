<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('posts',function(){
    return Task::all();
});

Route::post('posts',function(){
    return Task::create(
        [
            "title"=>request('title'),
            "body"=>request('body'),
            "cate_id"=>request('cate_id')
        ]
    );
});
