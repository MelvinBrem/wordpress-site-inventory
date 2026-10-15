<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HostingProviderController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/sites', [SiteController::class, 'index']);
Route::post('/sites/create', [SiteController::class, 'store']);
Route::get('/sites/create', [SiteController::class, 'create']);
Route::get('/sites/{site}', [SiteController::class, 'show']);
Route::get('/sites/{site}/edit', [SiteController::class, 'edit']);
Route::put('/sites/{site}/edit', [SiteController::class, 'update']);
Route::delete('/sites/{site}', [SiteController::class, 'destroy']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/contacts/create', [ContactController::class, 'store']);
Route::get('/contacts/create', [ContactController::class, 'create']);
Route::get('/contacts/{contact}', [ContactController::class, 'show']);
Route::get('/contacts/{contact}/edit', [ContactController::class, 'edit']);
Route::put('/contacts/{contact}/edit', [ContactController::class, 'update']);
Route::delete('/contacts/{contact}', [ContactController::class, 'destroy']);

Route::get('/hosting-providers', [HostingProviderController::class, 'index']);
Route::post('/hosting-providers/create', [HostingProviderController::class, 'store']);
Route::get('/hosting-providers/create', [HostingProviderController::class, 'create']);
Route::get('/hosting-providers/{hosting_provider}', [HostingProviderController::class, 'show']);
Route::get('/hosting-providers/{hosting_provider}/edit', [HostingProviderController::class, 'edit']);
Route::put('/hosting-providers/{hosting_provider}/edit', [HostingProviderController::class, 'update']);
Route::delete('/hosting-providers/{hosting_provider}', [HostingProviderController::class, 'destroy']);
