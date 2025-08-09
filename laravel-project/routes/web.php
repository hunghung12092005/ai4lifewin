<?php

use App\Http\Controllers\aiController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/chat', [HomeController::class, 'chat'])->name('home.chat');



Route::get('/api/link', [HomeController::class, 'Links'])->name('api.link');