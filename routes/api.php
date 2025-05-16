<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FilmController;
use App\Http\Controllers\API\ActorController;
use App\Http\Controllers\API\GenreController;
use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\RatingController;
use App\Http\Controllers\API\WatchlistController;
use App\Http\Controllers\API\ProfileController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Protected routes
Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::post('/logout', [AuthController::class, 'logout']);
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'show']);
    Route::put('/profile', [ProfileController::class, 'update']);
    
    // API Resources
    Route::apiResource('films', FilmController::class);
    Route::apiResource('actors', ActorController::class);
    Route::apiResource('genres', GenreController::class);
    
    // Nested Resources
    Route::apiResource('films.comments', CommentController::class);
    Route::apiResource('films.ratings', RatingController::class);
    
    // Watchlist
    Route::get('/watchlist', [WatchlistController::class, 'index']);
    Route::post('/watchlist/{film}', [WatchlistController::class, 'store']);
    Route::delete('/watchlist/{film}', [WatchlistController::class, 'destroy']);
    
    // Search and filters
    Route::get('/films/search/{query}', [FilmController::class, 'search']);
    Route::get('/actors/search/{query}', [ActorController::class, 'search']);
});
