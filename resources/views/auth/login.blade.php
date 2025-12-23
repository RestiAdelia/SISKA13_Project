<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
    <!-- Hero Background dengan Overlay -->
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center p-4"
        style="background-image: url('/images/hero1.jpg');">

        <!-- Overlay Gelap (Meningkatkan Kontras) -->
        <div class="absolute inset-0 bg-black/60 backdrop-blur-[2px]"></div>

        <!-- Card Glassmorphism -->
        <div
            class="relative w-full max-w-md bg-white/10 backdrop-blur-2xl p-8 rounded-3xl shadow-[0_20px_50px_rgba(0,0,0,0.3)] border border-white/20">

            <!-- Logo / Judul -->
            <div class="text-center mb-10">
                <h2 class="text-3xl font-black text-white mb-2 tracking-tight uppercase">Login</h2>
                <div class="h-1 w-12 bg-[#4C0025] mx-auto rounded-full mb-3"></div>
                <p class="text-gray-300 text-sm">Silakan masuk untuk melanjutkan</p>
            </div>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4 text-green-400 text-center text-sm font-medium" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf

                <!-- Email Address -->
                <div>
                    <label for="email"
                        class="block text-xs font-semibold text-gray-300 uppercase tracking-widest ml-1 mb-1">Email</label>
                    <div class="relative group">
                        <!-- Icon Email Baru -->
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-400 group-focus-within:text-white transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="block w-full pl-12 pr-4 py-3.5 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-gray-500 
                                   hover:bg-white/15 focus:ring-2 focus:ring-[#4C0025] focus:border-transparent 
                                   transition duration-300 outline-none backdrop-blur-sm"
                            placeholder="nama@email.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-xs italic" />
                </div>

                <!-- Password -->
                <div>
                    <label for="password"
                        class="block text-xs font-semibold text-gray-300 uppercase tracking-widest ml-1 mb-1">Password</label>
                    <div class="relative group">
                        <!-- Icon Gembok -->
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 text-gray-400 group-focus-within:text-white transition-colors"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full pl-12 pr-4 py-3.5 bg-white/10 border border-white/20 rounded-2xl text-white placeholder-gray-500 
                                   hover:bg-white/15 focus:ring-2 focus:ring-[#4C0025] focus:border-transparent 
                                   transition duration-300 outline-none backdrop-blur-sm"
                            placeholder="••••••••">
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-xs italic" />
                </div>

                <!-- Remember Me & Forgot Password -->

                <!-- Login Button -->
                <button type="submit"
                    class="w-full bg-[#4C0025] hover:bg-[#6b0035] active:scale-[0.97] text-white font-bold py-4 px-4 rounded-2xl shadow-xl transition-all duration-300 uppercase tracking-[0.2em] text-sm mt-4">
                    Masuk
                </button>
                <div class="flex items-center justify-between pb-2">

                    @if (Route::has('password.request'))
                        <a class="text-xs text-gray-300 hover:text-white transition-colors underline decoration-gray-600 underline-offset-4"
                            href="{{ route('password.request') }}">
                            Lupa Password?
                        </a>
                    @endif
                </div>

            </form>


        </div>
    </div>
</body>

</html>
