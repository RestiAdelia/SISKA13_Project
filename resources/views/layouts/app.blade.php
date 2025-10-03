<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>

<body class="h-screen bg-gray-100 font-sans flex">

    <!-- Sidebar -->
    <aside class="group relative h-screen bg-[#560029] text-white transition-all duration-300 w-16 hover:w-64">
        <!-- Logo / Judul -->
        <div class="px-4 py-4 font-bold whitespace-nowrap overflow-hidden flex items-center">
            <!-- Logo kecil -->
            <img src="/images/logo.jpg" alt="Logo" class="h-8 w-8 object-contain">
            <!-- Judul teks muncul saat hover -->
            <span class="ml-2 text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                SISKA13
            </span>
        </div>

        <nav class="flex-1 px-2 space-y-2">
            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md
             {{ request()->routeIs('dashboard') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-house"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity">Dashboard</span>
            </a>

            <a href="{{ route('visi-misi.index') }}"
                class="flex items-center gap-2 px-3 py-2 rounded-md
   {{ request()->routeIs('visi-misi.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-school"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity">Visi Misi</span>
            </a>

            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/20">
                <i class="fa-solid fa-user-graduate"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Data Siswa</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/20">
                <i class="fa-solid fa-chalkboard-teacher"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Data Guru</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/20">
                <i class="fa-solid fa-book"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Kelas</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/20">
                <i class="fa-solid fa-calendar-days"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Kegiatan</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/20">
                <i class="fa-solid fa-pen-to-square"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Rekap Absen</span>
            </a>
            <a href="#" class="flex items-center gap-3 px-3 py-2 rounded-md hover:bg-white/20">
                <i class="fa-solid fa-gear"></i>
                <span class="opacity-0 group-hover:opacity-100 transition-opacity duration-300">Pengaturan</span>
            </a>
        </nav>
    </aside>


    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white px-6 py-3 shadow">
            <h1 class="font-bold text-lg">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div>
                    <input type="text" placeholder="Cari data..."
                        class="px-3 py-2 border rounded-md w-64 focus:outline-none focus:ring focus:ring-pink-300">
                </div>
                <!-- User Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <img src="https://via.placeholder.com/35" class="h-9 w-9 rounded-full border" alt="User">
                        <div>
                            <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border py-2 z-50">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
