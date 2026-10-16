<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HostingProviderController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

// Auth
Route::view('/register', 'pages.auth.register')
    ->middleware('guest')
    ->name('auth.register');
Route::post('/register', Register::class)
    ->middleware('guest');

Route::view('/login', 'pages.auth.login')
    ->middleware('guest')
    ->name('auth.login');

Route::post('/login', Login::class)
    ->middleware('guest');

Route::post('/logout', Logout::class)
    ->name('auth.logout');

// Protected routes
Route::middleware('auth')->group(function () {
    Route::post('/sites/create', [SiteController::class, 'store']);
    Route::get('/sites/create', [SiteController::class, 'create']);
    Route::get('/sites/{site}/edit', [SiteController::class, 'edit']);
    Route::put('/sites/{site}/edit', [SiteController::class, 'update']);
    Route::delete('/sites/{site}', [SiteController::class, 'destroy']);

    Route::post('/contacts/create', [ContactController::class, 'store']);
    Route::get('/contacts/create', [ContactController::class, 'create']);
    Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit']);
    Route::put('/contacts/{contact}/edit', [ContactController::class, 'update']);
    Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

    Route::post('/hosting-providers/create', [HostingProviderController::class, 'store']);
    Route::get('/hosting-providers/create', [HostingProviderController::class, 'create']);
    Route::get('/hosting-providers/{hosting_provider}/edit', [HostingProviderController::class, 'edit']);
    Route::put('/hosting-providers/{hosting_provider}/edit', [HostingProviderController::class, 'update']);
    Route::delete('/hosting-providers/{hosting_provider}', [HostingProviderController::class, 'destroy']);
});

// Public routes
Route::get('/sites', [SiteController::class, 'index']);
Route::get('/sites/{site}', [SiteController::class, 'show']);
Route::get('/contacts', [ContactController::class, 'index']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);
Route::get('/hosting-providers', [HostingProviderController::class, 'index']);
Route::get('/hosting-providers/{hosting_provider}', [HostingProviderController::class, 'show']);
