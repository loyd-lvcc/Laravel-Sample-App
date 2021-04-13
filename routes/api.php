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
    Route::get('/users/{user}/posts', [PostController::class, 'posts']);
    Route::post('/users/{user}/posts', [PostController::class, 'store']); // create post
    Route::put('/users/{user}/posts/{post}', [PostController::class, 'update']); // update
    Route::delete('/users/{user}/posts/{post}', [PostController::class, 'destroy']); // delete
});



// listing of items = index
// single record or single post = show
// creation of data = create
// for delete = delete
// for update = update