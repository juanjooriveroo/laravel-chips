<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;

Route::get('/', [MemeController::class, 'index']);
Route::post('/memes', [MemeController::class, 'store']);

Route::get('/memes/{meme}/edit', [MemeController::class, 'edit'])->name('memes.edit');
Route::patch('/memes/{meme}', [MemeController::class, 'update'])->name('memes.update');
Route::delete('/memes/{meme}', [MemeController::class, 'destroy'])->name('memes.destroy');
