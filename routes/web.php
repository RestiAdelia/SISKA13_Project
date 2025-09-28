<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Landing Page
Route::get('/', function () {
    return view('landing');
});

// Login Page
Route::get('/login', function () {
    return view('login');
})->name('login');

// Proses Login (dummy tanpa database)
Route::post('/login', function (\Illuminate\Http\Request $request) {
    $username = $request->username;
    $password = $request->password;

    // hardcode user (contoh saja)
    if ($username === 'admin' && $password === '12345') {
        session(['user' => $username]);
        return redirect('/dashboard');
    }

    return back()->with('error', 'Username atau Password salah!');
});

// Dashboard setelah login
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect('/login');
    }
    return view('dashboard');
});

// Logout
Route::post('/logout', function () {
    session()->forget('user');
    return redirect('/');
})->name('logout');
