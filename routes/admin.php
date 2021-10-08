<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;



Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/posts', [PostController::class, 'create'])->name('posts.create');
});
