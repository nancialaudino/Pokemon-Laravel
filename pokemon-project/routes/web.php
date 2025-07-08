<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

Route::get('/', [HomepageController::class, 'index']);
Route::get('/product', [ProductController::class, 'index']);
Route::get('/user', [UserController::class, 'showUser']);