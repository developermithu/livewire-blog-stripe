<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PostController;
use App\Http\Controllers\Pages\AuthorController;
use App\Http\Controllers\Pages\CheckoutController;
use App\Http\Controllers\Pages\MembershipController;



require 'admin.php';

Route::get('/', HomeController::class)->name('home');
Route::get('/membership', MembershipController::class)->name('membership');
Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/checkout', CheckoutController::class)->name('checkout');

// Authors
Route::group(['prefix' => 'authors', 'as' => 'authors.'], function () {
    Route::get('/', [AuthorController::class, 'index'])->name('index');
    Route::get('michelle-jones', [AuthorController::class, 'show'])->name('show');
});

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/title-of-post', [PostController::class, 'show'])->name('posts.show');

// Tags 
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');

// Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
