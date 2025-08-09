<?php

use App\Http\Controllers\aiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/chat', [aiController::class, 'hotelLinks']);