<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        /* Custom Scrollbar untuk Sidebar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: transparent;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 10px;
        }
        .sidebar-scroll:hover::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.4);
        }
    </style>
</head>

<body class="h-screen bg-gray-100 font-sans flex overflow-hidden"> {{-- overflow-hidden di body agar scroll hanya di area main & sidebar --}}

    <!-- Sidebar -->
    {{-- Tambahkan flex flex-col --}}
    <aside class="group relative h-screen bg-[#560029] text-white transition-all duration-300 w-16 hover:w-64 flex flex-col shadow-xl z-50">
        
        <!-- Logo / Judul (Fixed at top) -->
        <div class="px-4 py-4 font-bold whitespace-nowrap overflow-hidden flex items-center flex-none">
            <img src="/images/logo.png" alt="Logo" class="h-12 w-12 object-contain shrink-0">
            <span class="ml-2 text-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                SISKA13
            </span>
        </div>

        <!-- Area Navigasi (Scrollable) -->
        {{-- Tambahkan class sidebar-scroll --}}
        <nav class="flex-1 px-2 py-2 space-y-2 overflow-y-auto overflow-x-hidden sidebar-scroll">

            <a href="{{ route('dashboard') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
               {{ request()->routeIs('dashboard') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-house w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Dashboard</span>
            </a>

            @if (Auth::user()->role !== 'orangtua')
                <a href="{{ route('visi-misi.index') }}"
                    class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
               {{ request()->routeIs('visi-misi.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                    <i class="fa-solid fa-school w-6 text-lg text-center shrink-0"></i>
                    <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Visi Misi</span>
                </a>
            @endif

            @if (Auth::user()->role !== 'orangtua')
                <a href="{{ route('guru_dan_staff.index') }}"
                    class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
              {{ request()->routeIs('guru_dan_staff.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                    <i class="fa-solid fa-chalkboard-teacher w-6 text-lg text-center shrink-0"></i>
                    <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Data Guru & Staf</span>
                </a>
            @endif

            <a href="{{ route('siswa.index') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                 {{ request()->routeIs('siswa.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-user-graduate w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Data Siswa</span>
            </a>

            <a href="{{ route('kelas.index') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                  {{ request()->routeIs('kelas.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-book w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Kelas</span>
            </a>

            @if (Auth::user()->role !== 'orangtua')
                <a href="{{ route('kegiatan.index') }}"
                    class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                {{ request()->routeIs('kegiatan.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                    <i class="fa-solid fa-camera w-6 text-lg text-center shrink-0"></i> {{-- icon diganti agar unik --}}
                    <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Kegiatan</span>
                </a>
            @endif

            @if (Auth::user()->role !== 'orangtua')
                <a href="{{ route('mou.index') }}"
                    class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                 {{ request()->routeIs('mou.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                    <i class="fa-solid fa-file-signature w-6 text-lg text-center shrink-0"></i>
                    <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">MoU</span>
                </a>
            @endif

            <a href="{{ route('absen.index') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                {{ request()->routeIs('absen.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-pen-to-square w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Rekap Absen</span>
            </a>

            <a href="{{ route('tugas.index') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md hover:bg-white/20 transition-colors duration-200
                {{ request()->routeIs('tugas.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-tasks w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Tugas Siswa</span>
            </a>

            @if (auth()->user()->role !== 'orangtua')
            <a href="{{ route('pesan.index') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                {{ request()->routeIs('pesan.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-envelope-open-text w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Pesan Masuk</span>
            </a>
            @endif

            <a href="{{ route('profile.show') }}"
                class="flex items-center gap-2 px-3 py-2.5 rounded-md transition-colors duration-200
                 {{ request()->routeIs('profile.*') ? 'bg-white/40 text-yellow-300' : 'hover:bg-white/20' }}">
                <i class="fa-solid fa-gear w-6 text-lg text-center shrink-0"></i>
                <span class="whitespace-nowrap opacity-0 group-hover:opacity-100 transition-opacity duration-300">Pengaturan</span>
            </a>

        </nav>
        
        {{-- Padding bawah agar menu terakhir tidak nempel sekali --}}
        <div class="h-4 flex-none"></div>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-w-0 overflow-hidden">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white px-6 py-3 shadow flex-none">
            <h1 class="font-bold text-lg text-gray-800 truncate">
                {{ $header ?? 'Dashboard' }}
            </h1>
            {{-- User Dropdown Tetap Sama... --}}
            <div class="flex items-center space-x-4">
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                        <img src="{{ Auth::user()->profile_photo_url }}" class="h-9 w-9 rounded-full border" alt="User">
                        <div class="hidden sm:block">
                            <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                        </div>
                        <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-44 bg-white rounded-lg shadow-lg border py-2 z-[60]">
                        <a href="{{ route('profile.show') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Lihat Profil</a>
                        <hr class="my-1 border-gray-200">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                        </form>
                    </div>
                </div>
            </div>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6 overflow-y-auto bg-gray-100">
            {{ $slot }}
            @yield('content')
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>