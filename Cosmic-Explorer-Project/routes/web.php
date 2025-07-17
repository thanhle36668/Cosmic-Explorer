<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CosmicExplorerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// User
Route::group(['prefix' => ''], function () {
    Route::get('/', [CosmicExplorerController::class, 'home'])->name('home');
    Route::get('/news', [CosmicExplorerController::class, 'news'])->name('news');
    Route::get('/collections-planets', [CosmicExplorerController::class, 'pageCollectionsPlanets'])->name('collections-planets');
    Route::get('/collections-observatories', [CosmicExplorerController::class, 'pageCollectionsObservatories'])->name('collections-observatories');
    Route::get('/collections-constellations', [CosmicExplorerController::class, 'pageCollectionsConstellations'])->name('collections-constellations');
    Route::get('/collections-books', [CosmicExplorerController::class, 'pageCollectionsBooks'])->name('collections-books');
    // News Page
    Route::get('/news', [CosmicExplorerController::class, 'news'])->name('news');
    Route::get('/new-details/{id}', [CosmicExplorerController::class, 'pageDetailsNew'])->name('details-new');
    // Details Page
    Route::get('/planet-details/{id}', [CosmicExplorerController::class, 'pageDetailsPlanet'])->name('details-planet');
    Route::get('/observatory-details/{id}', [CosmicExplorerController::class, 'pageDetailsObservatory'])->name('details-observatory');
    Route::get('/constellation-details/{id}', [CosmicExplorerController::class, 'pageDetailsConstellation'])->name('details-constellation');
    Route::get('/discovery-details/{id}', [CosmicExplorerController::class, 'pageDetailsDiscovery'])->name('details-discovery');
});


// Admin 
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
        Route::resource('posts', PostController::class);
        Route::resource('comments', CommentController::class);
    });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/all-news', [PostController::class, 'allnews'])->name('all-news');
Route::post('/process-login', [AuthController::class, 'processLogin'])->name('process-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
