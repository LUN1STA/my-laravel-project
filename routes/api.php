<?php

use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\AuthController;
use Illuminate\Support\Facades\Route;

Route::post('/signin/register', [AuthController::class, 'registration'])
    ->name('api.signin.register');

Route::post('/signin', [AuthController::class, 'login'])
    ->name('api.signin');

Route::get('/articles', [ArticleController::class, 'index'])
    ->name('api.articles.index');

Route::get('/articles/{article}', [ArticleController::class, 'show'])
    ->name('api.articles.show');

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('api.logout');

    Route::get('/user', [AuthController::class, 'user'])
        ->name('api.user');

    Route::post('/articles', [ArticleController::class, 'store'])
        ->name('api.articles.store');

    Route::put('/articles/{article}', [ArticleController::class, 'update'])
        ->name('api.articles.update');

    Route::delete('/articles/{article}', [ArticleController::class, 'destroy'])
        ->name('api.articles.destroy');
});
