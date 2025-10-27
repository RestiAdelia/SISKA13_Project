<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use App\Models\User;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Visi Misi
Route::resource('visi-misi', VisiMisiController::class)
    ->middleware(['auth']);

Route::resource('kegiatan', KegiatanController::class)
    ->middleware(['auth']);

Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🚀 Override Forgot Password
Route::get('/forgot-password', function () {
    $user = User::where('email', 'admin@gmail.com')->firstOrFail();
    $token = Password::createToken($user);

    return view('auth.reset-password', [
        'request' => request(),
        'token'   => $token,
        'email'   => $user->email,
    ]);
})->name('password.request');

// Taruh paling bawah baru load auth.php
require __DIR__ . '/auth.php';
