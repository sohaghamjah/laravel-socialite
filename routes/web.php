<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Google
Route::get('/login/google', [App\Http\Controllers\Auth\AuthController::class, 'redirectToGoogle'])->name('login.google');
Route::get('/login/google/callback', [App\Http\Controllers\Auth\AuthController::class, 'handleGooleCallback'])->name('login.google.callback');
// Facebook
Route::get('/login/facebook', [App\Http\Controllers\Auth\AuthController::class, 'redirectToFacebook'])->name('login.facebook');
Route::get('/login/facebook/callback', [App\Http\Controllers\Auth\AuthController::class, 'handleFacebookCallback'])->name('login.facebook.callback');
// Github
Route::get('/login/github', [App\Http\Controllers\Auth\AuthController::class, 'redirectToGithub'])->name('login.github');
Route::get('/login/github/callback', [App\Http\Controllers\Auth\AuthController::class, 'handleGithubCallback'])->name('login.github.callback');
