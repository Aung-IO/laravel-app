<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
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


