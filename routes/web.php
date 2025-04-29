<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ElementController;
use App\Http\Controllers\MultimediaController;
use App\Http\Controllers\FileController;

// Routes publiques
Route::get('/', [CategorieController::class, 'index'])->name('home');
Route::get('/categories', [CategorieController::class, 'index'])->name('categories.index');
Route::get('/categories/{category}', [CategorieController::class, 'show'])->name('categories.show');
Route::get('/categories/{category}/elements/{element}', [ElementController::class, 'show'])->name('elements.show');

// Route pour les fichiers (accès public)
Route::get('/files/{multimedia}', [FileController::class, 'show'])->name('files.show');

// Routes d'authentification admin
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'login']);
Route::post('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

// Routes administrateur protégées
Route::prefix('admin')->middleware('auth:admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/categories/{category}/elements', [AdminController::class, 'getElementsForCategory'])->name('admin.elements.list');
    
    Route::resource('categories', CategorieController::class, [
        'parameters' => ['categories' => 'category'],
        'except' => ['index', 'show']
    ]);
    
    // Routes for elements with category context
    Route::prefix('categories/{category}')->group(function () {
        Route::get('/elements/create', [ElementController::class, 'create'])->name('elements.create');
        Route::post('/elements', [ElementController::class, 'store'])->name('elements.store');
        Route::get('/elements/{element}/edit', [ElementController::class, 'edit'])->name('elements.edit');
        Route::put('/elements/{element}', [ElementController::class, 'update'])->name('elements.update');
        Route::delete('/elements/{element}', [ElementController::class, 'destroy'])->name('elements.destroy');
        
        // Upload routes
        Route::post('/elements/{element}/upload', [ElementController::class, 'uploadFile'])->name('elements.upload');
        
        // Multimedia routes
        Route::get('/elements/{element}/multimedias', [MultimediaController::class, 'index'])->name('multimedias.index');
        Route::post('/elements/{element}/multimedias', [MultimediaController::class, 'store'])->name('multimedias.store');
    });
    
    // Route de suppression des multimédias (déplacée hors du groupe de catégorie)
    Route::delete('/multimedias/{multimedia}', [MultimediaController::class, 'destroy'])->name('multimedias.destroy');
});

