<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);

// Protected routes that require authentication
Route::middleware(['auth'])->group(function () {
    // Redirect /home to /dashboard
    Route::get('/home', function() {
        return redirect('/dashboard');
    });
    
    // Dashboard route
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    
    // Product routes
    Route::resource('products', ProductController::class);
});
