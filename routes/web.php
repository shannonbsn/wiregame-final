<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;

Route::get('/', [GameController::class, 'showLoginForm'])->name('login.show');
Route::post('/login', [GameController::class, 'login'])->name('login.submit');

Route::get('/game', [GameController::class, 'preview'])->name('game');

Route::get('/scan/{wireframeId}', [GameController::class, 'scanQrCode'])->name('game.scan');

Route::post('/logout', [GameController::class, 'logout'])->name('logout');