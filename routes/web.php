<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;



Route::get('/', [BlogController::class,'index']);


Route::get('/blogs/{blog:slug}', [BlogController::class,'show'])->where('slug', '[A-z\d\-_]+');
Route::get('/categories/{category:slug}', [CategoryController::class,'index'])->where('slug', '[A-z\d\-_]+');
Route::get('/users/{user:id}', [UserController::class,'index'])->where('id', '[A-z\d\-_]+');

