<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans antialiased">
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center"
        style="background-image: url('/images/hero1.jpg');">
        <div class="absolute inset-0 bg-black bg-opacity-40"></div> <!-- Overlay gelap -->

        <!-- Card Transparan Maroon -->
        <div class="relative backdrop-blur-lg p-8 rounded-2xl shadow-xl w-full max-w-md text-white"
            style="border: 1px solid #4C0025; ">

            <!-- Title -->
            <h2 class="text-3xl font-bold text-center mb-6 drop-shadow-lg" style="color: #e6e2e4;">Login</h2>

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div class="mb-4">
                    <x-input-label for="email" :value="__('Email')" style="color: #e6e2e4;" />
                    <x-text-input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username"
                        class="block mt-1 w-full bg-white/10 placeholder-pink-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4C0025] focus:border-[#4C0025]"
                        style="color: white; border: 1px solid #4C0025;" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" style="color: #4C0025;" />

                </div>

                <!-- Password -->
                <!-- Password -->
                <div class="mb-4">
                    <x-input-label for="password" :value="__('Password')" style="color: #e6e2e4;" />
                    <x-text-input id="password" name="password" type="password" required
                        autocomplete="current-password"
                        class="block mt-1 w-full bg-white/10 rounded-lg focus:outline-none focus:ring-2 focus:ring-[#4C0025] focus:border-[#4C0025]"
                        style="color: white; border: 1px solid #4C0025;" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2" style="color: #4C0025;" />
                </div>


                <!-- Forgot Password -->
                <div class="flex items-center justify-between mb-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm hover:underline" href="{{ route('password.request') }}"
                            style="color: #e6e2e4;">
                            {{ __('Forgot Password?') }}
                        </a>
                    @endif
                </div>

                <!-- Login Button -->
                <x-primary-button
                    class="w-full justify-center py-2 rounded-lg shadow-lg transition-transform duration-100"
                    style="
        background-color: #4C0025;
        color: #ffffff;
        box-shadow: 0 4px 6px rgba(76,0,37,0.5);
    "
                    onmouseover="this.style.backgroundColor='#6B0035';"
                    onmouseout="this.style.backgroundColor='#4C0025';"
                    onmousedown="this.style.backgroundColor='#33001A'; this.style.transform='scale(0.98)';"
                    onmouseup="this.style.backgroundColor='#4C0025'; this.style.transform='scale(1)';">
                    {{ __('Login') }}
                </x-primary-button>

            </form>
        </div>
    </div>
</body>

</html>