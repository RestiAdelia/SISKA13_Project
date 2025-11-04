<?php

use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\GuruDanStaffController;
use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Controllers\Auth\OTPController;

// Landing Page
Route::get('/', [LandingPageController::class, 'index'])->name('landing');
// Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Visi Misi
Route::middleware(['auth'])->group(function () {

    Route::resource('visi-misi', VisiMisiController::class)
        ->middleware(['auth']);

Route::resource('kegiatan', KegiatanController::class)
    ->middleware(['auth']);

    Route::get('/kegiatan/{id}', [KegiatanController::class, 'show'])->name('kegiatan.show');
});



// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Minta OTP
    Route::get('/password/otp', [OTPController::class, 'requestOtpForm'])->name('password.requestOtpForm');
    Route::post('/password/send-otp', [OTPController::class, 'sendOtp'])->name('password.sendOtp');

    // Verifikasi OTP
    Route::get('/password/verify-otp', [OTPController::class, 'verifyOtpForm'])->name('password.verifyOtpForm');
    Route::post('/password/verify-otp', [OTPController::class, 'verifyOtp'])->name('password.verifyOtp');

    // Form Update Password setelah OTP sukses
    Route::get('/password/update', [OTPController::class, 'updatePasswordForm'])->name('password.updateForm');
    Route::post('/password/update', [OTPController::class, 'updatePassword'])->name('password.updatePassword');
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

//start guru dan staff


Route::middleware(['auth'])->group(function () {
    Route::resource('guru_dan_staff', GuruDanStaffController::class);
    Route::resource('kelas', KelasController::class);
});
