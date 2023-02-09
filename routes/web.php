<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;



Route::get('/', [BlogController::class,'index']);


Route::get('/blogs/{blog:slug}', [BlogController::class,'show'])->where('slug', '[A-z\d\-_]+');

Route::get('/users/{user:name}', [UserController::class, 'index'])->where('name', '[A-z\d\-_]+');

Route::get('register', [AuthController::class, 'create']);

                       