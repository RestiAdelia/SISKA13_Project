<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl md:text-3xl text-gray-800 leading-tight">
                {{ __('Detail Data Siswa') }}
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-[#560029] transition-colors">Dashboard</a></li>
                    <li>/</li>
                    <li><a href="{{ route('siswa.index') }}" class="hover:text-[#560029] transition-colors">Data Siswa</a></li>
                    <li>/</li>
                    <li class="font-medium text-gray-900">Detail</li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                
                {{-- Header Profil Singkat --}}
                <div class="bg-gradient-to-r from-[#560029] to-[#80003d] px-6 py-8 text-white">
                    <div class="flex flex-col md:flex-row items-center gap-6">
                        {{-- Avatar Inisial --}}
                        <div class="w-20 h-20 rounded-full bg-white/20 backdrop-blur-sm border-2 border-white/30 flex items-center justify-center text-3xl font-bold shadow-inner">
                            {{ substr($siswa->nama_siswa, 0, 1) }}
                        </div>
                        <div class="text-center md:text-left">
                            <h3 class="text-2xl font-bold">{{ $siswa->nama_siswa }}</h3>
                            <p class="text-white/80 text-sm mt-1 flex items-center justify-center md:justify-start gap-3">
                                <span class="flex items-center gap-1"><i class="fa-solid fa-id-card"></i> {{ $siswa->nisn }}</span>
                                <span class="w-1 h-1 rounded-full bg-white/50"></span>
                                <span class="flex items-center gap-1"><i class="fa-solid fa-chalkboard-user"></i> {{ $siswa->kelas->nama_kelas ?? '-' }}</span>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 md:p-8 space-y-8">
                    
                    {{-- Grid Layout Utama --}}
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        
                        {{-- Kolom Kiri --}}
                        <div class="space-y-8">
                            
                            {{-- Section: Identitas & Akademik --}}
                            <div class="bg-white rounded-lg">
                                <h4 class="text-lg font-bold text-[#560029] flex items-center gap-2 mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-graduation-cap"></i> Data Akademik
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">NIPD</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $siswa->nipd }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">NISN</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $siswa->nisn }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">Kelas</span>
                                        <span class="px-2 py-1 rounded bg-[#560029]/10 text-[#560029] text-xs font-bold">
                                            {{ $siswa->kelas->nama_kelas ?? '-' }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">Tahun Ajaran</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $siswa->tahun_ajar }}</span>
                                    </div>
                                </div>
                            </div>

                            {{-- Section: Data Pribadi --}}
                            <div class="bg-white rounded-lg">
                                <h4 class="text-lg font-bold text-[#560029] flex items-center gap-2 mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-user"></i> Data Pribadi
                                </h4>
                                <div class="space-y-3">
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">Jenis Kelamin</span>
                                        <span class="text-sm font-medium text-gray-800">
                                            @if($siswa->jenis_kelamin == 'L') Laki-laki @else Perempuan @endif
                                        </span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">Tempat Lahir</span>
                                        <span class="text-sm font-medium text-gray-800">{{ $siswa->tempat_lahir }}</span>
                                    </div>
                                    <div class="flex justify-between items-center py-2 border-b border-gray-50 hover:bg-gray-50 transition px-2 rounded">
                                        <span class="text-sm text-gray-500">Tanggal Lahir</span>
                                        <span class="text-sm font-medium text-gray-800">
                                            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->translatedFormat('d F Y') }}
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                        {{-- Kolom Kanan --}}
                        <div class="space-y-8">

                            {{-- Section: Orang Tua --}}
                            <div class="bg-white rounded-lg">
                                <h4 class="text-lg font-bold text-[#560029] flex items-center gap-2 mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-users"></i> Data Orang Tua
                                </h4>
                                <div class="grid grid-cols-1 gap-4">
                                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                        <div class="flex items-center gap-3 mb-1">
                                            <div class="w-8 h-8 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 text-xs">
                                                <i class="fa-solid fa-user-tie"></i>
                                            </div>
                                            <span class="text-xs font-bold text-gray-500 uppercase">Ayah</span>
                                        </div>
                                        <p class="text-base font-semibold text-gray-800 ml-11">{{ $siswa->orangtua_laki_laki ?? '-' }}</p>
                                    </div>
                                    <div class="bg-gray-50 p-4 rounded-lg border border-gray-100">
                                        <div class="flex items-center gap-3 mb-1">
                                            <div class="w-8 h-8 rounded-full bg-pink-100 flex items-center justify-center text-pink-600 text-xs">
                                                <i class="fa-solid fa-user"></i>
                                            </div>
                                            <span class="text-xs font-bold text-gray-500 uppercase">Ibu</span>
                                        </div>
                                        <p class="text-base font-semibold text-gray-800 ml-11">{{ $siswa->orangtua_perempuan ?? '-' }}</p>
                                    </div>
                                </div>
                            </div>

                            {{-- Section: Alamat --}}
                            <div class="bg-white rounded-lg">
                                <h4 class="text-lg font-bold text-[#560029] flex items-center gap-2 mb-4 border-b border-gray-100 pb-2">
                                    <i class="fa-solid fa-location-dot"></i> Alamat Domisili
                                </h4>
                                <div class="bg-gray-50 p-4 rounded-lg border border-gray-100 text-gray-700 leading-relaxed text-sm">
                                    {{ $siswa->alamat ?? '-' }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Footer Buttons --}}
                    <div class="pt-6 border-t border-gray-100 flex justify-end gap-3">
                        <a href="{{ route('siswa.index') }}"
                            class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition font-medium shadow-sm flex items-center gap-2">
                            <i class="fa-solid fa-arrow-left"></i> Kembali
                        </a>
                        <a href="{{ route('siswa.edit', $siswa->id) }}"
                            class="px-5 py-2.5 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition shadow-md hover:shadow-lg font-medium flex items-center gap-2">
                            <i class="fa-solid fa-pen-to-square"></i> Edit Data
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>