<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\MultimediaController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('admins', AdminController::class);
Route::resource('categories', CategorieController::class);
Route::resource('elements', ElementController::class);
Route::resource('multimedias', MultimediaController::class);

