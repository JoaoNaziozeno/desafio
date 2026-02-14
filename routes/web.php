<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
	return redirect()->route('login');
});

Auth::routes();

Route::middleware('auth')->group(function () {
	Route::get('/home', [HomeController::class, 'index'])->name('home');

	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');

	Route::resource('noticias', NoticiasController::class);
});

Route::get('/feed', [NoticiasController::class, 'feed'])->name('noticias.feed');