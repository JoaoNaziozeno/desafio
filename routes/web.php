<?php

use App\Http\Controllers\NoticiasController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;

/*
Route::get('/', function () {
	return redirect()->route('login');
});

Auth::routes();*/

Route::get('/', [NoticiasController::class, 'feed'])->name('home');

Route::get('/noticias/{noticia}', [NoticiasController::class, 'show'])->name('noticias.show');


Route::middleware('auth')->prefix('admin')->group(function () {
	Route::resource	('noticias', NoticiasController::class)						->except(['show']);
	Route::resource	('users', 			UserController::class);
	Route::get		('auth/register', 	[UserController::class, 'register'])	->name('auth.register');
	Route::get		('profile/index',	[ProfileController::class, 'index'])	->name('profile.index');
	Route::get		('profile', 		[ProfileController::class, 'edit'])		->name('profile.edit');
	Route::put		('profile', 		[ProfileController::class, 'update'])	->name('profile.update');
	Route::put		('profile/password',[ProfileController::class, 'password'])	->name('profile.password');
	Route::delete	('profile', 		[ProfileController::class, 'destroy'])	->name('profile.destroy');
});

Auth::routes();
