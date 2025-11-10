<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            Detail Data Siswa
        </h2>
    </x-slot>

    <div class="py-8 px-4 md:px-10 max-w-5xl mx-auto">
        <div class="bg-white p-6 md:p-8 rounded-lg shadow-md border border-gray-200">

            {{-- Identitas Siswa --}}
            <div class="mb-6">
                <h3 class="text-xl font-semibold mb-3 text-gray-800 flex items-center border-b pb-2">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    Identitas Siswa
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Siswa</p>
                        <p class="text-base text-gray-900">{{ $siswa->nama_siswa }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Jenis Kelamin</p>
                        <p class="text-base text-gray-900">{{ $siswa->jenis_kelamin }}</p>
                    </div>
                </div>
            </div>

            {{-- Data Akademik --}}
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-xl font-semibold mb-3 text-gray-800 flex items-center border-b pb-2">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                    Data Akademik
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach ([
        'NIPD' => $siswa->nipd,
        'NISN' => $siswa->nisn,
        'Kelas' => $siswa->kelas->nama_kelas ?? '-',
        'Tahun Ajaran' => $siswa->tahun_ajar,
    ] as $label => $value)
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">{{ $label }}
                            </p>
                            <p class="text-base text-gray-900">{{ $value }}</p>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Data Pribadi --}}
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-xl font-semibold mb-3 text-gray-800 flex items-center border-b pb-2">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    Data Pribadi
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tempat Lahir</p>
                        <p class="text-base text-gray-900">{{ $siswa->tempat_lahir }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Tanggal Lahir</p>
                        <p class="text-base text-gray-900">
                            {{ \Carbon\Carbon::parse($siswa->tanggal_lahir)->format('d F Y') }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Data Orang Tua --}}
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-xl font-semibold mb-3 text-gray-800 flex items-center border-b pb-2">
                    <svg class="w-5 h-5 mr-2 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0zM7 10a2 2 0 11-4 0 2 2 0z" />
                    </svg>
                    Data Orang Tua
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Ayah</p>
                        <p class="text-base text-gray-900">{{ $siswa->orangtua_laki_laki ?? '-' }}</p>
                    </div>
                    <div class="bg-gray-50 p-3 rounded-lg">
                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wide">Nama Ibu</p>
                        <p class="text-base text-gray-900">{{ $siswa->orangtua_perempuan ?? '-' }}</p>
                    </div>
                </div>
            </div>

            {{-- Alamat --}}
            <div class="border-t border-gray-200 pt-6 mt-6">
                <h3 class="text-xl font-semibold mb-3 text-gray-800 flex items-center border-b pb-2">
                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    Alamat
                </h3>
                <div class="bg-gray-50 p-3 rounded-lg">
                    <p class="text-base text-gray-900">{{ $siswa->alamat ?? '-' }}</p>
                </div>
            </div>

            {{-- Tombol Aksi --}}
            <div class="flex justify-end gap-3 mt-8">
                <a href="{{ route('siswa.index') }}"
                    class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 transition duration-200 text-sm">
                    Kembali
                </a>
                <a href="{{ route('siswa.edit', $siswa->id) }}"
                    class="px-4 py-2 bg-yellow-300 text-gray-800 font-semibold rounded-md hover:bg-yellow-400 transition duration-200 text-sm">
                    Edit
                </a>

            </div>

        </div>
    </div>

</x-app-layout>
