<?php

use App\Http\Controllers\BookmarkController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => view('app'));

Route::get('/urls', [BookmarkController::class, 'index']);
Route::post('/urls', [BookmarkController::class, 'store']);
Route::put('/urls/{id}', [BookmarkController::class, 'update']);
Route::delete('/urls/{id}', [BookmarkController::class, 'destroy']);
