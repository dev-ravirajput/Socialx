<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/notification/read/{notification}', [DashboardController::class, 'markAsRead'])->name('notification.read');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::get('/profile/{id}', [ProfileController::class, 'see_profile'])->name('see.profile');
    Route::post('/profile-update', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/follow/{user}', [ProfileController::class, 'follow'])->name('follow');
    Route::post('/unfollow/{user}', [ProfileController::class, 'unfollow'])->name('unfollow');


    /* Post Controller */
    Route::get('/create-post', [PostController::class, 'create'])->name('post.create');
    Route::post('/store-post', [PostController::class, 'store'])->name('post.store');
    // Likes
    Route::post('/posts/{post}/like', [LikeController::class, 'store'])->name('posts.like');
    Route::delete('/posts/{post}/like', [LikeController::class, 'destroy'])->name('posts.unlike');

    // Comments
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

require __DIR__.'/auth.php';
