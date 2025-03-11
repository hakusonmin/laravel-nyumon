<?php

use App\Http\Controllers\DiaryController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/diary', [DiaryController::class, 'index'])->name('diary.index');
Route::get('/diary/create', [DiaryController::class, 'create'])->name('diary.create');
Route::post('/diary', [DiaryController::class, 'store'])->name('diary.store');
Route::get('/diary/{id}', [DiaryController::class, 'show'])->name('diary.show');
Route::get('/diary/{id}/edit', [DiaryController::class, 'edit'])->name('diary.edit');
Route::patch('/diary/{id}', [DiaryController::class, 'update'])->name('diary.update');
Route::delete('/diary/{id}', [DiaryController::class, 'destroy'])->name('diary.destroy');

require __DIR__ . '/api.php';