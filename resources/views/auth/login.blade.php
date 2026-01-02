<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased text-gray-900">
  
    <div class="relative min-h-screen flex items-center justify-center bg-cover bg-center p-4"
        style="background-image: url('/images/hero1.jpg');">

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

           <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf

                <!-- Email Address -->
                <div>
                   
                    <label for="email" class="block text-[10px] font-bold text-white uppercase tracking-[0.2em] ml-2 mb-2">Alamat Email</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-focus-within:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <input id="email" type="email" name="email" :value="old('email')" required autofocus
                            class="block w-full pl-12 pr-4 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-gray-500 
                                   hover:bg-white/10 focus:bg-white/10 focus:ring-2 focus:ring-[#4C0025] focus:border-transparent 
                                   transition-all duration-300 outline-none backdrop-blur-sm shadow-inner"
                            placeholder="nama@email.com">
                    </div>
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-400 text-[10px] italic ml-2" />
                </div>

                <!-- Password -->
                <div>
                   
                    <label for="password" class="block text-[10px] font-bold text-white uppercase tracking-[0.2em] ml-2 mb-2">Kata Sandi</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 group-focus-within:text-white transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                        </div>
                        <input id="password" type="password" name="password" required autocomplete="current-password"
                            class="block w-full pl-12 pr-12 py-4 bg-white/5 border border-white/10 rounded-2xl text-white placeholder-gray-500 
                                   hover:bg-white/10 focus:bg-white/10 focus:ring-2 focus:ring-[#4C0025] focus:border-transparent 
                                   transition-all duration-300 outline-none backdrop-blur-sm shadow-inner"
                            placeholder="••••••••">
                        
                        <!-- Show/Hide Password Toggle -->
                        <button type="button" onclick="togglePasswordVisibility()" class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-500 hover:text-white transition-colors focus:outline-none">
                            <svg id="eye-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg id="eye-off-icon" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.976 9.976 0 012.146-3.559M8.29 8.29a4 4 0 015.656 5.656m0 0l4.95 4.95M15 12a3 3 0 11-6 0 3 3 0 016 0zm6.364 0c-.312-.992-.76-1.928-1.316-2.775M17.657 17.657A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.542-7a9.976 9.976 0 012.146-3.559M3 3l18 18" />
                            </svg>
                        </button>
                    </div>
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-400 text-[10px] italic ml-2" />
                </div>

                <!-- Login Button -->
                <div class="pt-2">
                    <button type="submit"
                        class="w-full bg-[#4C0025] hover:bg-[#6b0035] active:scale-[0.98] text-white font-black py-4 px-4 rounded-2xl shadow-2xl transition-all duration-300 uppercase tracking-[0.3em] text-xs">
                        Masuk 
                    </button>
                </div>
            </form>

        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eye-icon');
            const eyeOffIcon = document.getElementById('eye-off-icon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.add('hidden');
                eyeOffIcon.classList.remove('hidden');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('hidden');
                eyeOffIcon.classList.add('hidden');
            }
        }
    </script>
</body>

</html>