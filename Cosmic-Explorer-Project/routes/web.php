<?php

use App\Http\Controllers\CosmicExplorerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// User
Route::group(['prefix' => ''], function () {
    Route::get('/', [CosmicExplorerController::class, 'home'])->name('home');
    Route::get('/planet/{id}', [CosmicExplorerController::class, 'pageDetailsPlanet'])->name('details-planet');
    Route::get('/observatory/{id}', [CosmicExplorerController::class, 'pageDetailsObservatory'])->name('details-observatory');
});


// Admin 
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->group(function () {
        Route::get('/', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
        Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
        Route::resource('comments', CommentController::class);
    });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/process-login', [AuthController::class, 'processLogin'])->name('process-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
