<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;

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


Route::get('/test', [PostController::class, 'test']);


// Route::get('/products');
// Route::get('/products/{id}');
// Route::post('/products');
// Route::put('/products/{id}');
// Route::delete('/products/{id}');

// // list of post of a user
Route::get('/users/{user}/posts', [PostController::class, 'posts']);
Route::post('/users/{user}/posts', [PostController::class, 'store']); // create post
Route::put('/users/{user}/posts/{post}', [PostController::class, 'update']); // update
Route::delete('/users/{user}/posts/{post}', [PostController::class, 'destroy']); // delete

// Route::get('/posts'); // any user

