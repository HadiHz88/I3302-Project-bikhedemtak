<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


Route::get('/', [ServiceRequestController::class, 'index']);

Route::get('/jobs/create', [ServiceRequestController::class, 'create'])->middleware('auth');
Route::post('/jobs', [ServiceRequestController::class, 'store'])->middleware('auth');

Route::get('/search', SearchController::class)->name('search');
Route::get('/tags/{tag:name}', TagController::class);

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'create']);
    Route::post('/login', [SessionController::class, 'store']);
});

Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');


Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.show');

Route::get('/become-provider', [ProviderController::class, 'create'])->name('providers.create');
Route::post('/become-provider', [ProviderController::class, 'store'])->name('providers.store');