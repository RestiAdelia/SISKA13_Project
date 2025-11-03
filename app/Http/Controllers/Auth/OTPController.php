<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendOTPEmail;

class OTPController extends Controller
{
    // Form untuk meminta OTP
    public function requestOtpForm()
    {
        return view('auth.send-otp');
    }

    // Kirim OTP ke email
    public function sendOtp(Request $request)
    {
        $otp = rand(100000, 999999); // generate OTP 6 digit
        session(['otp' => $otp, 'otp_expired' => now()->addMinutes(5)]);

        Mail::to(Auth::user()->email)->send(new SendOTPEmail($otp));

        return redirect()->route('password.verifyOtpForm')->with('status', 'Kode OTP telah dikirim ke email.');
    }

    // Form verifikasi OTP
    public function verifyOtpForm()
    {
        return view('auth.verify-otp');
    }

    // Cek OTP
    public function verifyOtp(Request $request)
    {
        $request->validate([
            'otp' => 'required|numeric'
        ]);

        if (session('otp') == $request->otp && now()->lt(session('otp_expired'))) {
            session(['otp_verified' => true]);
            return redirect()->route('password.updateForm')->with('status', 'OTP berhasil diverifikasi.');
        }

        return back()->withErrors(['otp' => 'Kode OTP salah atau sudah kadaluarsa.']);
    }

    // Form update password
    public function updatePasswordForm()
    {
        if (!session('otp_verified')) {
            return redirect()->route('password.requestOtpForm')->withErrors(['otp' => 'Silakan verifikasi OTP terlebih dahulu.']);
        }
        return view('auth.update-password');
    }

    // Update password
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required|confirmed|min:8',
        ]);

        /** @var \App\Models\User $user */
        $user = Auth::user();
        $user->password = Hash::make($request->password);
        $user->save();

        // Hapus OTP dari session
        session()->forget(['otp', 'otp_expired', 'otp_verified']);

        return redirect()->route('profile.edit')->with('status', 'Password berhasil diperbarui.');
    }
}
