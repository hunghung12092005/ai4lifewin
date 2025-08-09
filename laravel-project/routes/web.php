<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/chat', [HomeController::class, 'chat'])->name('home.chat');

Route::post('/api/link', [HomeController::class, 'Links'])->name('api.link');

// Chia sẻ câu trả lời qua liên kết/QR
Route::post('/share', [HomeController::class, 'share'])->name('share.create');
Route::get('/share/{id}', [HomeController::class, 'viewShare'])->name('share.view');

// Thống kê ngành học được quan tâm (cache nhẹ)
Route::post('/stats/majors', [HomeController::class, 'updateMajorStats'])->name('stats.majors.update');
Route::get('/stats/majors', [HomeController::class, 'getMajorStats'])->name('stats.majors.get');

// Lưu form hồ sơ người dùng
Route::post('/forms', [HomeController::class, 'saveForm'])->name('forms.save');
Route::get('/forms', [HomeController::class, 'listForms'])->name('forms.list');
Route::get('/forms/{id}', [HomeController::class, 'getForm'])->name('forms.get');
Route::delete('/forms/{id}', [HomeController::class, 'deleteForm'])->name('forms.delete');
