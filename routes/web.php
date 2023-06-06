<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Authenticate;
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

Route::get('/', [PostController::class, 'showHome'])->name('index');

Route::get('/posts', [PostController::class, 'showAll']);
Route::get('/post/{post:slug}', [PostController::class, 'showDetail']);
Route::get('/posts/{tag:slug}', [PostController::class, 'filterOnTag']);
Route::post('/search', [PostController::class, 'filterOnSearch']);

Route::get('/profile/{user:slug}', [UserController::class, 'showProfile']);

Route::get('/create-post', [PostController::class, 'showForm'])
->middleware(Authenticate::class);
Route::post('/create-post', [PostController::class, 'submitForm']);

Route::get('/sign-in', [UserController::class, 'showSignIn'])->name('login');
Route::post('/sign-in', [UserController::class, 'submitSignIn']);

Route::get('/sign-up', [UserController::class, 'showSignUp']);
Route::post('/sign-up', [UserController::class, 'submitSignUp']);

Route::get('/log-out', [UserController::class, 'logout']);

Route::get('/edit/{post:slug}', [PostController::class, 'showEditForm'])
->middleware(Authenticate::class);
Route::post('/edit-post/{post:slug}', [PostController::class, 'editPost']);

Route::get('/delete/{post:slug}', [PostController::class, 'deletePost']);