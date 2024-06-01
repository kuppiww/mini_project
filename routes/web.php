<?php

use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/home', [MediaController::class, 'home'])->name('home');
Route::get('/home', [MediaController::class, 'home'])->name('home')->middleware('auth');

Route::get('login', [MediaController::class, 'showLoginForm'])->name('login');
Route::post('login', [MediaController::class, 'login']);
Route::post('/login_user', [MediaController::class, 'loginUser'])->name('login_user');
Route::post('/logout', [MediaController::class, 'logout'])->name('logout');

Route::get('register', [MediaController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [MediaController::class, 'register'])->name('register');
Route::post('/follow/{id}', [MediaController::class, 'follow'])->name('follow');

Route::get('/explore', [MediaController::class, 'explore'])->name('explore');

Route::post('/profile/update', [MediaController::class, 'updateProfile'])->name('profile.update');
Route::get('/profile', [MediaController::class, 'showProfile'])->name('profile');

Route::get('/post', [MediaController::class, 'showPostForm'])->name('post.create');
Route::post('/post', [MediaController::class, 'storePost'])->name('post.store');

Route::get('/notifications', [MediaController::class, 'notifications'])->name('notifications');

Route::get('/bookmarks', function () {
    return view('bookmarks');
})->name('bookmarks');

Route::middleware(['auth'])->group(function () {
    Route::post('/posts', [MediaController::class, 'storePost'])->name('posts.store');
    Route::post('/posts/{post}/comments', [MediaController::class, 'storeComment'])->name('comments.store');
    Route::post('/posts/{post}/likes', [MediaController::class, 'storeLike'])->name('likes.store');
    Route::post('/follow/{user}', [MediaController::class, 'follow'])->name('follow.store');
    Route::delete('/unfollow/{user}', [MediaController::class, 'unfollow'])->name('follow.destroy');
    Route::get('/profile', [MediaController::class, 'showProfile'])->name('profile.show');
    Route::post('/profile/update', [MediaController::class, 'updateProfile'])->name('profile.update');
    Route::get('/profile/{id}/edit', [MediaController::class, 'showEdit'])->name('profile.edit');
});
