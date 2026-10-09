<?php

use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

Route::get('/', [SiteController::class, 'index']);

Route::post('/create-site', [SiteController::class, 'store']);
Route::get('/create-site', [SiteController::class, 'create']);
