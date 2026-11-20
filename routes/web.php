<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/galery/{id}', [MainController::class, 'galery'])->name('galery');
Route::get('/signin', [AuthController::class, 'create'])->name('signin');

Route::post('/signin/register', [AuthController::class, 'registration'])
    ->name('signin.register');

Route::post('/signin', [AuthController::class, 'login'])
    ->name('signin.login');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::resource('/articles', ArticleController::class)
    ->only(['create', 'store', 'edit', 'update', 'destroy'])
    ->middleware('auth:sanctum');

Route::resource('/articles', ArticleController::class)
    ->only(['index', 'show']);

Route::post('/articles/{article}/comments', [CommentController::class, 'store'])
    ->middleware('auth:sanctum')
    ->name('comments.store');
Route::put('/comments/{comment}', [CommentController::class, 'update'])
    ->middleware('auth:sanctum')
    ->name('comments.update');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->middleware('auth:sanctum')
    ->name('comments.destroy');
Route::get('/comments/moderation', [CommentController::class, 'moderation'])
    ->middleware('auth:sanctum')
    ->name('comments.moderation');
Route::patch('/comments/{comment}/approve', [CommentController::class, 'approve'])
    ->middleware('auth:sanctum')
    ->name('comments.approve');
Route::delete('/comments/{comment}/reject', [CommentController::class, 'reject'])
    ->middleware('auth:sanctum')
    ->name('comments.reject');

Route::get('/notifications/{notification}/read', function ($notification) {
    $user = Auth::user();

    $notification = $user->notifications()
        ->where('id', $notification)
        ->firstOrFail();

    $notification->markAsRead();

    return redirect()
        ->route('articles.show', $notification->data['article_id']);
})
    ->middleware('auth:sanctum')
    ->name('notifications.read');

Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contacts', function () {

    $contacts = [
        [
            'name' => 'Арефьева Василиса',
            'role' => 'Разработчик',
            'phone' => '+7 (900) 123-45-67',
            'email' => 'arefevavasilisa@example.com',
        ],
        [
            'name' => 'Анна Петрова',
            'role' => 'Дизайнер',
            'phone' => '+7 (900) 765-43-21',
            'email' => 'anna@example.com',
        ],
    ];

    return view('contacts', [
        'contacts' => $contacts
    ]);
})->name('contacts');
