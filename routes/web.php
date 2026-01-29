<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MemeController;
use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\Auth\Login;
use App\Http\Controllers\Auth\Logout;

Route::get('/', [MemeController::class, 'index']);

// Registration routes
Route::view('/register', 'auth.register')
	->middleware('guest')
	->name('register');

Route::post('/register', Register::class)
	->middleware('guest');

// Login routes
Route::view('/login', 'auth.login')
    ->middleware('guest')
    ->name('login');

Route::post('/login', Login::class)
    ->middleware('guest');

// Protected meme actions
Route::middleware('auth')->group(function () {
	Route::post('/memes', [MemeController::class, 'store']);
	Route::get('/memes/{meme}/edit', [MemeController::class, 'edit'])->name('memes.edit');
	Route::patch('/memes/{meme}', [MemeController::class, 'update'])->name('memes.update');
	Route::delete('/memes/{meme}', [MemeController::class, 'destroy'])->name('memes.destroy');

	Route::post('/logout', Logout::class)->name('logout');
});
