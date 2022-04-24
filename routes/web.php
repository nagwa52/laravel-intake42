<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
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


Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy');
// ============================================================================================
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comments}/update', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comments}/delete', [CommentController::class, 'destroy'])->name('comments.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
