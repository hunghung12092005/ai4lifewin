<?php

use App\Http\Controllers\aiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/chat', [aiController::class, 'hotelLinks']);