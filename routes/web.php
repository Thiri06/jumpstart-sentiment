<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AdminController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');


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
});

require __DIR__ . '/auth.php';
