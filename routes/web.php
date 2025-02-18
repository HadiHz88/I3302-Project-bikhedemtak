<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [ServiceRequestController::class, 'index']);
Route::get('/about', [AuthController::class, 'about']);
Route::get('/search', SearchController::class)->name('search');
Route::get('/tags/{tag:name}', TagController::class);
Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.show');

// Guest Only Routes
Route::middleware('guest')->group(function () {
    // Authentication
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Auth
    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');

    // Profile Management
    Route::prefix('profile')->name('profile.')->middleware('auth')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('update');
        Route::get('/password', [ProfileController::class, 'editPassword'])->name('password.edit');
        Route::patch('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
    });

    // Provider Management
    Route::prefix('provider')->name('provider.')->group(function () {
        Route::get('/become', [ProviderController::class, 'create'])->name('create');
        Route::post('/become', [ProviderController::class, 'store'])->name('store');
        Route::post('/{provider}/rate', [ProviderController::class, 'rate'])->name('rate');
    });

    // Service Requests
    Route::prefix('service-requests')->name('service-requests.')->group(function () {
        Route::get('/create', [ServiceRequestController::class, 'create'])->name('create');
        Route::post('/', [ServiceRequestController::class, 'store'])->name('store');
    });
});
