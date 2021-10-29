<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


// singup ans login
Route::post('signup', [UserController::class, 'signup']);   //read or create new account
Route::post('login', [UserController::class, 'login']);

// posts
Route::get('posts', [PostController::class, 'index']);
Route::get('posts/{id}', [PostController::class, 'show']);


// private route
// before login user have to throgth sanctum
Route::group(['middleware' => ['auth:sanctum']], function(){

    // posts
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);

    ///////// logout
    Route::post('logout', [UserController::class, 'logout']);
});


// "token": "3|4lkaGeeHSdcrcc3d47Tthdh4icoCyC3UrIl5fIUR"