<?php

use App\Http\Controllers\ProviderController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;

// Home Route
Route::get('/', [ServiceRequestController::class, 'index']);

// Service Request Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/service-requests/create', [ServiceRequestController::class, 'create'])->name('service-requests.create');
    Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service-requests.store');
});

// Search and Tag Routes
Route::get('/search', SearchController::class)->name('search');
Route::get('/tags/{tag:name}', TagController::class);

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create']);
    Route::post('/register', [RegisteredUserController::class, 'store']);

    Route::get('/login', [SessionController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [SessionController::class, 'login'])->name('login.store');
});

Route::delete('/logout', [SessionController::class, 'logout'])->middleware('auth')->name('logout');

// Provider Routes
Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.show');
Route::middleware('auth')->group(function () {
    Route::get('/become-provider', [ProviderController::class, 'create'])->name('providers.create');
    Route::post('/become-provider', [ProviderController::class, 'store'])->name('providers.store');
});

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [RegisteredUserController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [RegisteredUserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [RegisteredUserController::class, 'update'])->name('profile.update');
});

Route::post('/provider/{provider}/rate', [ProviderController::class, 'rate'])->name('provider.rate')->middleware('auth');

// About Route
Route::get('/about', function () {
    $userCount = App\Models\User::count();
    $providerCount = App\Models\Provider::count();
    $serviceRequestCount = App\Models\ServiceRequest::count();
    $goodRatingCount = App\Models\Rating::where('rating', '>=', 4)->count();

    return view('about', [
        'userCount' => $userCount,
        'providerCount' => $providerCount,
        'serviceRequestCount' => $serviceRequestCount,
        'goodRatingCount' => $goodRatingCount,
    ]);
});
