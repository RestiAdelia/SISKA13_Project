<x-app-layout>
    {{-- Judul di header layout --}}
    <x-slot name="header">
        <h1 class="font-bold text-lg">Profil Saya</h1>
    </x-slot>

    <section class="py-10">
        {{-- Header --}}
        @if (session('status') === 'profile-updated')
            {{-- Notifikasi Sukses dengan Tailwind CSS --}}
            <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4"
                role="alert">

                <strong class="font-bold">Sukses!</strong>
                <span class="block sm:inline">Informasi profil Anda telah berhasil diperbarui.</span>

                {{-- Tombol Tutup Opsional --}}
                <span class="absolute top-0 bottom-0 right-0 px-4 py-3 cursor-pointer" @click="show = false">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
                    </svg>
                </span>
            </div>
        @endif
        <header class="mb-8 border-b pb-4 text-center md:text-left">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                {{ __('Informasi Profil') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Lihat detail akun dan informasi pribadi Anda.') }}
            </p>
        </header>

        {{-- Grid dua kolom --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center justify-center">
            {{-- FOTO PROFIL --}}
            <div class="flex flex-col items-center justify-center w-full">
                <div class="relative w-150 h-150 md:w-80 md:h-80 flex justify-center items-center">
                    <img src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/200' }}"
                        alt="Foto Profil"
                        class="w-full h-full object-cover border-4 border-gray-300 dark:border-gray-700 shadow-lg rounded-2xl">
                </div>
            </div>

            {{-- DETAIL PROFIL --}}
            <div class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                {{-- Nama --}}
                <div>
                    <x-input-label :value="__('Nama')" />
                    <p class="mt-2 text-gray-900 dark:text-white font-medium">{{ $user->name }}</p>
                </div>

                {{-- Email --}}
                <div>
                    <x-input-label :value="__('Email')" />
                    <p class="mt-2 text-gray-900 dark:text-white font-medium">{{ $user->email }}</p>
                </div>

                {{-- Alamat --}}
                <div>
                    <x-input-label :value="__('Alamat')" />
                    <p class="mt-2 text-gray-900 dark:text-white font-medium">
                        {{ $user->alamat ?? '-' }}
                    </p>
                </div>

                {{-- Telepon --}}
                <div>
                    <x-input-label :value="__('No Telepon')" />
                    <p class="mt-2 text-gray-900 dark:text-white font-medium">
                        {{ $user->telepon ?? '-' }}
                    </p>
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-4 pt-6 border-t mt-6">
                    <a href="{{ route('dashboard') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        Kembali
                    </a>

                    <a href="{{ route('profile.edit') }}"
                        class="bg-[#820642] hover:bg-[#b94e81] text-white font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        <i class="fa-solid fa-pen-to-square mr-2"></i> Edit Profil
                    </a>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
