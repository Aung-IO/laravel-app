<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Models\User;

Route::get('/', [BlogController::class, 'index']);


Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('slug', '[A-z\d\-_]+');

Route::get('/users/{user:name}', [UserController::class, 'index'])->where('name', '[A-z\d\-_]+');

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');

Route::post('/register', [AuthController::class, 'registerStore'])->middleware('guest');

Route::get('/login',[AuthController::class, 'login'])->middleware('guest');

Route::post('/login', [AuthController::class, 'loginStore']);

Route::post('/logout', [AuthController::class,'logout']);

//comment
Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store'])->name('blogs.comments.store');

//subscription route
Route::post('/blogs/{blog:slug}/subscription', [SubscriptionController::class, 'toggleSubscription']);

Route::get('/admin', [AdminBlogController::class, 'index'])->middleware('admin');

Route::post('/admin/blogs', [AdminBlogController::class, 'store']);