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


Route::get('/provider/{id}', [ProviderController::class, 'show'])->name('provider.show');

Route::get('/become-provider', [ProviderController::class, 'create'])->name('providers.create');
Route::post('/become-provider', [ProviderController::class, 'store'])->name('providers.store');



// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [RegisteredUserController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [RegisteredUserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [RegisteredUserController::class, 'update'])->name('profile.update');
});


// about
Route::get('/about', function () {

    // User count
    $userCount = App\Models\User::count();

    // Provider count
    $providerCount = App\Models\Provider::count();

    // Service Request count
    $serviceRequestCount = App\Models\ServiceRequest::count();

    // Good Rating count (+4 stars)
    $goodRatingCount = App\Models\Rating::where('rating', '>=', 4)->count();

    return view('about', [
        'userCount' => $userCount,
        'providerCount' => $providerCount,
        'serviceRequestCount' => $serviceRequestCount,
        'goodRatingCount' => $goodRatingCount,
    ]);
});
