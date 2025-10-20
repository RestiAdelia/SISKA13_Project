<?php

use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisiMisiController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Visi Misi
Route::resource('visi-misi', VisiMisiController::class);

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

Route::post('/logout', function (Request $request) {
    Auth::guard('web')->logout();

    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('/');
})->name('logout');

//lihat profile
Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');


// Taruh paling bawah baru load auth.php
require __DIR__ . '/auth.php';
