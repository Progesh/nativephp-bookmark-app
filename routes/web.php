<?php

use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::resource('urls', BookmarkController::class);
Route::resource('categories', CategoryController::class);
