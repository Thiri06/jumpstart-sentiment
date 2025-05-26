<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductController::class, 'show'])->name('products.show');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.show');

// Authenticated User Routes
Route::middleware(['auth'])->group(function () {
    Route::post('/products/{id}/reviews', [ProductController::class, 'storeReview'])->name('reviews.store');
    Route::post('/contact', [ContactController::class, 'storeInquiry'])->name('contact.store');
});

Route::middleware(['auth', 'auth-user'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return Auth::user()->is_admin ?
            redirect()->route('admin.dashboard') : //admin will be directed to admin dashboard after logging in
            redirect()->route('welcome'); //normal users will be directed back to welcome page after registering or logging in
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reviews', [AdminController::class, 'showReviews'])->name('reviews');
    Route::get('/inquiries', [AdminController::class, 'showInquiries'])->name('inquiries');


    // Route for deleting reviews
    Route::delete('/reviews/{review}', [App\Http\Controllers\Admin\AdminController::class, 'deleteReview'])->name('reviews.delete');

    // Route for deleting inquiries
    Route::delete('/inquiries/{review}', [AdminController::class, 'deleteInquiry'])->name('inquiries.delete');
});

require __DIR__ . '/auth.php';
