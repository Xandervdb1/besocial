<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
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

Route::get('/profile/{user:slug}', [UserController::class, 'showProfile']);

Route::get('/create-post', [PostController::class, 'showForm']);
Route::post('/create-post', [PostController::class, 'submitForm']);