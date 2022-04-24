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



Route::group(['middleware' => ['auth']], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
    Route::get('/posts/create/', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show')->middleware('auth');
    Route::put('/posts/{post}/update', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
    Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
});
// ============================================================================================
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::put('/comments/{comments}/update', [CommentController::class, 'update'])->name('comments.update');
Route::delete('/comments/{comments}/delete', [CommentController::class, 'destroy'])->name('comments.destroy');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
