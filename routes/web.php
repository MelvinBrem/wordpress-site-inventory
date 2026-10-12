<?php

use App\Http\Controllers\HomeController;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HostingProviderController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\TagController;

use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::get('/sites', [SiteController::class, 'index']);
Route::post('/create-site', [SiteController::class, 'store']);
Route::get('/create-site', [SiteController::class, 'create']);

Route::get('/contacts', [ContactController::class, 'index']);
Route::post('/create-contact', [ContactController::class, 'store']);
Route::get('/create-contact', [ContactController::class, 'create']);

Route::get('/hosting-providers', [HostingProviderController::class, 'index']);
Route::post('/create-hosting-provider', [HostingProviderController::class, 'store']);
Route::get('/create-hosting-provider', [HostingProviderController::class, 'create']);
