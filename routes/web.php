<?php

use App\Http\Controllers\AbsenController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\VisiMisiController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\OTPController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuruDanStaffController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MouController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TugasController;


Route::get('/', [LandingPageController::class, 'index'])->name('landing');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
Route::resource('visi-misi', VisiMisiController::class)->middleware(['auth']);

Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');

    // OTP Password
    Route::get('/password/otp', [OTPController::class, 'requestOtpForm'])->name('password.requestOtpForm');
    Route::post('/password/send-otp', [OTPController::class, 'sendOtp'])->name('password.sendOtp');
    Route::get('/password/verify-otp', [OTPController::class, 'verifyOtpForm'])->name('password.verifyOtpForm');
    Route::post('/password/verify-otp', [OTPController::class, 'verifyOtp'])->name('password.verifyOtp');
    Route::get('/password/update', [OTPController::class, 'updatePasswordForm'])->name('password.updateForm');
    Route::post('/password/update', [OTPController::class, 'updatePassword'])->name('password.updatePassword');
});


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

Route::middleware(['auth'])->group(function () {
    Route::resource('guru_dan_staff', GuruDanStaffController::class);
    Route::resource('kelas', KelasController::class);
    Route::resource('siswa', SiswaController::class);
    Route::resource('mou', MouController::class);
    Route::resource('tugas', TugasController::class);
    Route::resource('absen', AbsenController::class);
    // Per-siswa  and management (edit/update by siswa)
    Route::get('absen/siswa/{siswa}/edit', [AbsenController::class, 'editSiswa'])->name('absen.siswa.edit');
    Route::put('absen/siswa/{siswa}', [AbsenController::class, 'updateSiswa'])->name('absen.siswa.update');
    Route::get('/absen/siswa/{siswa}', [AbsenController::class, 'show'])->name('absen.siswa.show');

    // Route untuk reset satu minggu
//Route::delete('/absen/{siswa}/reset-weekly', [AbsenController::class, 'destroyWeekly'])->name('absen.destroyWeekly');
Route::delete('/absen/siswa/{siswa}/reset', [AbsenController::class, 'destroyWeekly'])->name('absen.destroyWeekly');
    // Route untuk hapus satu record spesifik
    Route::delete('/absen/{absen}', [AbsenController::class, 'destroy'])->name('absen.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('kegiatan', KegiatanController::class)->except(['show']);
});
Route::get('/kegiatan/{kegiatan}', [KegiatanController::class, 'show'])->name('kegiatan.show');

// PUBLIK
Route::post('/hubungi-kami', [ContactController::class, 'store'])
    ->name('contact.store');

// ADMIN
Route::middleware(['auth'])->group(function () {

    Route::get('/pesan', [ContactController::class, 'index'])
        ->name('pesan.index');

    Route::get('/pesan/{contact}', [ContactController::class, 'show'])
        ->name('pesan.show');

    Route::delete('/pesan/{contact}', [ContactController::class, 'destroy'])
        ->name('pesan.destroy');
});

Route::get('/test-email', function () {
    Mail::raw('Tes Email dari Laravel', function ($message) {
        $message->to('sdnsiska13@gmail.com')
            ->subject('Tes Email');
    });

    return 'Email terkirim';
});
require __DIR__ . '/auth.php';
