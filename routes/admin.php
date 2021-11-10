<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\WriterController;
use App\Http\Controllers\Writer\PostController as WriterPostController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => ['auth', 'isAdmin']], function () {

    Route::get('/', DashboardController::class)->name('index');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');

    Route::resource('/posts', PostController::class);
    Route::resource('/tags', TagController::class);

    // Writer Posts
    Route::get('writer/posts', WriterPostController::class)->name('writer.posts.index');
    // Writer
    Route::get('writers', [WriterController::class, 'index'])->name('writers.index');
});
