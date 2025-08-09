<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/chat', [HomeController::class, 'chat'])->name('home.chat');

Route::post('/api/link', [HomeController::class, 'Links'])->name('api.link');
