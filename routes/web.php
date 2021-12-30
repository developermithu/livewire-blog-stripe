<?php

use App\Http\Controllers\Dashboard\BillingController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Pages\TagController;
use App\Http\Controllers\Pages\HomeController;
use App\Http\Controllers\Pages\PostController;
use App\Http\Controllers\Pages\AuthorController;
use App\Http\Controllers\Pages\CommentController;
use App\Http\Controllers\Pages\MembershipController;
use App\Http\Controllers\Pages\SubscriptionController;
use App\Http\Controllers\Stripe\PaymentController;

require 'admin.php';

Route::get('/', HomeController::class)->name('home');
Route::get('/users', [UserController::class, 'index'])->name('users');


// Authenticate Route
Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/membership', MembershipController::class)->name('membership');
    Route::get('/payments', [PaymentController::class, 'index'])->name('payments');
    Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

    Route::get('/subscription/update/{subscription}', [SubscriptionController::class, 'update'])->name('subscription.update');
    Route::get('/subscription/cancel/{subscription}', [SubscriptionController::class, 'destroy'])->name('subscription.destroy');

    // Billing
    Route::get('/dashboard/billing', [BillingController::class, 'index'])->name('billing.index');
    Route::get('/dashboard/billing/invoices/{invoice}', [BillingController::class, 'download'])->name('billing.invoice.download');
});

// Authors
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');
Route::get('/{user:name}', [AuthorController::class, 'show'])->name('authors.show');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');

// Tags 
Route::get('/tags', [TagController::class, 'index'])->name('tags.index');
Route::get('/{tag}', [TagController::class, 'show'])->name('tags.show');

// Dashboard
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
