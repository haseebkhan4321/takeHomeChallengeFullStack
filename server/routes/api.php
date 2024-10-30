<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/articles', [ArticleController::class, 'index']); // Get all articles
Route::post('/articles', [ArticleController::class, 'store']); // Create a new article
Route::get('/articles/{id}', [ArticleController::class, 'show']); // Get a specific article
Route::put('/articles/{id}', [ArticleController::class, 'update']); // Update a specific article
Route::delete('/articles/{id}', [ArticleController::class, 'destroy']); // Delete a specific article

Route::middleware('auth:sanctum')->group(function(){
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});
