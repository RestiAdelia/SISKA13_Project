<x-app-layout>
   <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Pengaturan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            {{-- Notifikasi Sukses --}}
            @if (session('status') === 'profile-updated')
                <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)"
                    class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-xl mb-6 shadow-md"
                    role="alert">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-3 text-green-500"></i>
                        <span class="font-bold">Sukses!</span>
                        <span class="ml-1 block sm:inline">Informasi profil Anda telah berhasil diperbarui.</span>
                    </div>
                </div>
            @endif
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-1 bg-white p-6 rounded-2xl shadow-xl border border-gray-100 flex flex-col items-center">
                    
                    <div class="relative w-48 h-48 mb-6">
                        <img src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/200' }}"
                            alt="Foto Profil"
                            {{-- Warna Border: Menggunakan warna kustom #560029 --}}
                            class="w-full h-full object-cover border-4 border-[#560029] shadow-2xl rounded-full transform hover:scale-105 transition duration-500 ease-in-out">
                    </div>
                    
                    <h2 class="text-2xl font-bold text-gray-900 mb-1">{{ $user->name }}</h2>
                    <p class="text-sm text-gray-500 mb-6">{{ $user->email }}</p>

                    <a href="{{ route('profile.edit') }}"
                        {{-- Tombol Aksi: Menggunakan warna kustom #560029 --}}
                        class="w-full text-center bg-[#560029] hover:bg-[#3f0020] text-white font-semibold px-4 py-2.5 rounded-xl shadow-lg shadow-[#560029]/30 transition duration-300 transform hover:scale-[1.02] flex items-center justify-center">
                        <i class="fas fa-pen-to-square mr-2"></i> Edit Profil
                    </a>
                </div>
                <div class="lg:col-span-2 space-y-8">
                    <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
                          <header>
                        <h2 class="text-3xl font-extrabold text-gray-900 mb-2">Informasi Akun</h2>
                       
                    </header>
                        <dl class="divide-y divide-gray-100">
                            
                            {{-- Nama --}}
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 flex items-center">
                                    <i class="fas fa-user mr-2 w-4"></i> Nama Lengkap
                                </dt>
                                <dd class="mt-1 text-base text-gray-900 font-semibold sm:col-span-2 sm:mt-0">
                                    {{ $user->name }}
                                </dd>
                            </div>

                            {{-- Email --}}
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 flex items-center">
                                    <i class="fas fa-envelope mr-2 w-4"></i> Email Aktif
                                </dt>
                                <dd class="mt-1 text-base text-gray-900 font-semibold sm:col-span-2 sm:mt-0">
                                    {{ $user->email }}
                                </dd>
                            </div>

                            {{-- No Telepon --}}
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 flex items-center">
                                    <i class="fas fa-phone mr-2 w-4"></i> No Telepon
                                </dt>
                                <dd class="mt-1 text-base text-gray-900 font-semibold sm:col-span-2 sm:mt-0">
                                    {{ $user->telepon ?? 'Belum Diisi' }}
                                </dd>
                            </div>

                            {{-- Alamat --}}
                            <div class="py-4 sm:grid sm:grid-cols-3 sm:gap-4">
                                <dt class="text-sm font-medium text-gray-500 flex items-center">
                                    <i class="fas fa-map-marker-alt mr-2 w-4"></i> Alamat
                                </dt>
                                <dd class="mt-1 text-base text-gray-900 font-semibold sm:col-span-2 sm:mt-0">
                                    {{ $user->alamat ?? 'Belum Diisi' }}
                                </dd>
                            </div>

                        </dl>
                        
                        {{-- Tombol Kembali --}}
                        <div class="flex justify-start mt-6 pt-4 border-t border-gray-100">
                            <a href="{{ route('dashboard') }}"
                                class="border border-gray-300 text-gray-700 rounded-xl hover:bg-gray-50 transition duration-300 px-6 py-2.5 flex items-center">
                                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>