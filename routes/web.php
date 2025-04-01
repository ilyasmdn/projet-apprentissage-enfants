<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('categories', CategorieController::class);
Route::resource('elements', ElementController::class);
Route::resource('multimedias', MultimediaController::class);
Route::resource('admins', AdminController::class);

