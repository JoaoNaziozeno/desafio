<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
Route::get('/', function () {
	return redirect()->route('login');
});

Auth::routes();*/

Route::get('/', [NoticiasController::class, 'feed'])->name('home');

Route::get('/noticias/{noticia}', [NoticiasController::class, 'show'])->name('noticias.show');


Route::middleware('auth')->prefix('admin')->group(function () {
	Route::resource('noticias', NoticiasController::class)->except(['show']);

	Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::put('profile/password', [ProfileController::class, 'password'])->name('profile.password');
});

Auth::routes();
