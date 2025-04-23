<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ElementController;

// Routes publiques
Route::get('/', [CategorieController::class, 'index'])->name('home');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/{categorie}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{categorie}/elements/{element}', [ElementController::class, 'show'])->name('elements.show');

// Routes d'authentification admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Routes administrateur protégées
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/categories/{categorieId}/elements', [AdminController::class, 'getElementsForCategory'])->name('admin.elements.list');
    
    Route::resource('categories', CategorieController::class)->except(['index', 'show']);
    Route::resource('elements', ElementController::class)->except(['show']);
    
    // Routes pour l'upload de fichiers
    Route::get('/categories/{category}/elements/{element}/upload', [ElementController::class, 'showUploadForm'])->name('elements.upload.form');
    Route::post('/categories/{category}/elements/{element}/upload', [ElementController::class, 'uploadFile'])->name('elements.upload');
});

