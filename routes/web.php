<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome');

Route::view('ajaran', 'ajaran')
    ->middleware(['auth', 'verified'])
    ->name('ajaran');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

Route::view('program-studi', 'program-studi')
    ->middleware(['auth', 'verified'])
    ->name('program-studi');

require __DIR__.'/auth.php';
