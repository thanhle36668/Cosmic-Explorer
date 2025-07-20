<?php

use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\CosmicExplorerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// User
Route::group(['prefix' => ''], function () {
    Route::get('/', [CosmicExplorerController::class, 'home'])->name('home');
    Route::get('/news', [CosmicExplorerController::class, 'news'])->name('news');
    Route::get('/about', [CosmicExplorerController::class, 'about'])->name('about');
    Route::get('/collections-planets', [CosmicExplorerController::class, 'pageCollectionsPlanets'])->name('collections-planets');
    Route::get('/collections-observatories', [CosmicExplorerController::class, 'pageCollectionsObservatories'])->name('collections-observatories');
    Route::get('/collections-constellations', [CosmicExplorerController::class, 'pageCollectionsConstellations'])->name('collections-constellations');
    Route::get('/collections-books', [CosmicExplorerController::class, 'pageCollectionsBooks'])->name('collections-books');
    Route::get('/collections-videos', [CosmicExplorerController::class, 'pageCollectionsVideos'])->name('collections-videos');
    // News Page
    Route::get('/news', [CosmicExplorerController::class, 'news'])->name('news');
    Route::get('/details-new/{id}', [CosmicExplorerController::class, 'pageDetailsNew'])->name('details-new');
    // Details Page
    Route::get('/details-planet/{slug}', [CosmicExplorerController::class, 'pageDetailsPlanet'])->name('details-planet');
    Route::get('/details-observatory/{slug}', [CosmicExplorerController::class, 'pageDetailsObservatory'])->name('details-observatory');
    Route::get('/details-constellation/{slug}', [CosmicExplorerController::class, 'pageDetailsConstellation'])->name('details-constellation');
    Route::get('/details-discovery/{slug}', [CosmicExplorerController::class, 'pageDetailsDiscovery'])->name('details-discovery');
    Route::get('/details-book/{slug}', [CosmicExplorerController::class, 'pageDetailsBook'])->name('details-book');
    Route::post('/send-message', [MessagesController::class, 'sendMessage'])->name('send-message');
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
        Route::get('/messages', [MessagesController::class, 'messages'])->name('messages');
        Route::get('/details-message/{id}', [MessagesController::class, 'detailsMessage'])->name('details-message');
        Route::post('/reply-message', [MessagesController::class, 'replyMessage'])->name('reply-message');
        Route::get('/delete-message/{id}', [MessagesController::class, 'deleteMessage'])->name('delete-message');
        Route::post('/search-message', [MessagesController::class, 'searchMessage'])->name('search-message');
    });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/all-news', [PostController::class, 'allnews'])->name('all-news');
Route::post('/process-login', [AuthController::class, 'processLogin'])->name('process-login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
