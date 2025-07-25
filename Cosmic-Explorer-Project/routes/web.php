<?php

use App\Http\Controllers\Admin\CustomizationController;
use App\Http\Controllers\Admin\MessagesController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\SubscribeController;
use App\Http\Controllers\Admin\CommentsController;
use App\Http\Controllers\CosmicExplorerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;

use Illuminate\Support\Facades\Route;

// User
Route::group(['prefix' => ''], function () {
    Route::get('/', [CosmicExplorerController::class, 'home'])->name('home');

    // About Page
    Route::get('/about', [CosmicExplorerController::class, 'about'])->name('about');

    // Collection Page
    Route::get('/collection-planet', [CosmicExplorerController::class, 'pageCollectionsPlanets'])->name('collections-planets');
    Route::get('/collection-observatory', [CosmicExplorerController::class, 'pageCollectionsObservatories'])->name('collections-observatories');
    Route::get('/collection-constellation', [CosmicExplorerController::class, 'pageCollectionsConstellations'])->name('collections-constellations');
    Route::get('/collection-book', [CosmicExplorerController::class, 'pageCollectionsBooks'])->name('collections-books');
    Route::get('/collection-video', [CosmicExplorerController::class, 'pageCollectionsVideos'])->name('collections-videos');

    // Details Page
    Route::get('/details-planet/{slug}', [CosmicExplorerController::class, 'pageDetailsPlanet'])->name('details-planet');
    Route::get('/details-observatory/{slug}', [CosmicExplorerController::class, 'pageDetailsObservatory'])->name('details-observatory');
    Route::get('/details-constellation/{slug}', [CosmicExplorerController::class, 'pageDetailsConstellation'])->name('details-constellation');
    Route::get('/details-discovery/{slug}', [CosmicExplorerController::class, 'pageDetailsDiscovery'])->name('details-discovery');
    Route::get('/details-book/{slug}', [CosmicExplorerController::class, 'pageDetailsBook'])->name('details-book');
    Route::post('/send-message', [MessagesController::class, 'sendMessage'])->name('send-message');
    Route::post('/created-subscribe', [SubscribeController::class, 'createdSubscribe'])->name('created-subscribe');
});


// Admin 
Route::middleware(['auth', 'is_admin'])->prefix('admin')->name('admin.')
    ->group(function () {
        Route::get('/', fn() => view('admin.dashboard'))
            ->name('admin.dashboard');
        Route::resource('posts', PostController::class);
        // Route::resource('comments', CommentController::class);
        // Dashboard Comments
        Route::resource('comments', CommentsController::class)->names('comments');

        // Dashboard Messages
        Route::get('/messages', [MessagesController::class, 'messages'])->name('messages');
        Route::get('/details-message/{id}', [MessagesController::class, 'editMessage'])->name('details-message');
        Route::post('/reply-message', [MessagesController::class, 'replyMessage'])->name('reply-message');
        Route::get('/delete-message/{id}', [MessagesController::class, 'deleteMessage'])->name('delete-message');
        Route::post('/search-message', [MessagesController::class, 'searchMessage'])->name('search-message');

        // Dashboard Subscribe
        Route::get('/subscribe', [SubscribeController::class, 'subscribe'])->name('subscribe');
        Route::get('/details-subscribe/{slug}', [SubscribeController::class, 'editSubscribe'])->name('edit-subscribe');
        Route::post('/updates-subscribe', [SubscribeController::class, 'updatesSubscribe'])->name('updates-subscribe');
        Route::get('/delete-subscribe/{slug}', [SubscribeController::class, 'deleteSubscribe'])->name('delete-subscribe');
        Route::post('/search-subscribe', [SubscribeController::class, 'searchSubscribe'])->name('search-subscribe');

        // Customization Introduction
        Route::get('/customization-introduction', [CustomizationController::class, 'introduction'])->name('customization-introduction');
        Route::put('/updated-introduction', [CustomizationController::class, 'updatedIntroduction'])->name('updated-introduction');
        // Customization About
        Route::get('/customization-about', [CustomizationController::class, 'about'])->name('customization-about');
        Route::put('/updated-about', [CustomizationController::class, 'updatedAbout'])->name('updated-about');

        // Customization Discovery
        Route::get('/customization-discovery', [CustomizationController::class, 'discovery'])->name('customization-discovery');
        Route::get('/create-discovery', [CustomizationController::class, 'createDiscovery'])->name('create-discovery');
        Route::put('/save-post-discovery', [CustomizationController::class, 'savePostDiscovery'])->name('save-post-discovery');
        Route::get('/edit-discovery/{slug}', [CustomizationController::class, 'editDiscovery'])->name('edit-discovery');
        Route::put('/updated-discovery', [CustomizationController::class, 'updatedDiscovery'])->name('updated-discovery');
        Route::get('/delete-discovery/{id}', [CustomizationController::class, 'deleteDiscovery'])->name('delete-discovery');
        Route::post('/search-discovery', [CustomizationController::class, 'searchDiscovery'])->name('search-discovery');

        // Customization Planets
        Route::get('/customization-planets', [CustomizationController::class, 'planets'])->name('customization-planets');
        Route::get('/create-planet', [CustomizationController::class, 'createPlanet'])->name('create-planet');
        Route::put('/save-planet', [CustomizationController::class, 'savePlanet'])->name('save-planet');
        Route::get('/delete-planet/{id}', [CustomizationController::class, 'deletePlanet'])->name('delete-planet');
        Route::get('/edit-planet/{slug}', [CustomizationController::class, 'editPlanet'])->name('edit-planet');
        Route::put('/updated-planet', [CustomizationController::class, 'updatedPlanet'])->name('updated-planet');
        Route::post('/search-planet', [CustomizationController::class, 'searchPlanet'])->name('search-planet');
    });

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/posts/{slug}', [PostController::class, 'show'])->name('posts.show');
Route::get('/all-news', [PostController::class, 'allnews'])->name('all-news');
Route::post('/process-login', [AuthController::class, 'processLogin'])->name('process-login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
