<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;

use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class);

Route::post('/create-site', [SiteController::class, 'store']);
Route::get('/create-site', [SiteController::class, 'create']);
