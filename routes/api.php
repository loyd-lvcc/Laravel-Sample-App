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
Route::post('login', [UserController::class, 'login']);
Route::post('signup', [UserController::class, 'signup']);

Route::group(['middleware' => ['authToken']], function() {
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts', [PostController::class, 'create']);
    Route::put('posts', [PostController::class, 'update']);
    Route::delete('posts', [PostController::class, 'delete']);
});



// listing of items = index
// single record or single post = show
// creation of data = create
// for delete = delete
// for update = update