<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Visi & Misi') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header Section dengan Tombol Tambah -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Visi & Misi</h1>
                    <p class="text-gray-600 mt-1">Kelola visi dan misi sekolah dengan mudah</p>
                </div>
                <a href="{{ route('visi-misi.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition-all duration-300 transform hover:scale-105 hover:shadow-xl flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                    </svg>
                    Tambah Data
                </a>
            </div>

            <!-- Grid Card -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                @forelse ($visimisi as $item)
                    <div
                        class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-300">

                        <!-- Content Card -->
                        <div class="p-6">

                            <!-- Nama Sekolah & Akreditasi -->
                            <div class="mb-6 pb-4 border-b-2 border-blue-100">
                                <h3 class="text-2xl md:text-3xl font-bold text-gray-800 mb-3">
                                    {{ $item->nama_sekolah }}
                                </h3>
                                <span
                                    class="inline-block bg-blue-100 text-blue-700 px-4 py-2 rounded-full text-sm font-semibold">
                                    Akreditasi: {{ $item->akreditasi }}
                                </span>
                            </div>

                            <!-- Visi Section -->
                            <div class="mb-6">
                                <div class="flex items-start gap-3">
                                    <div class="bg-blue-100 p-2 rounded-lg flex-shrink-0">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                    <div class="flex-1">
                                        <h4 class="text-lg font-bold text-gray-800 mb-2">Visi</h4>
                                        <p class="text-gray-700 leading-relaxed">{{ $item->visi }}</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Divider -->
                            <hr class="my-6 border-gray-200">

                            <!-- Misi Section -->
                            <div>
                                <div class="flex items-center gap-3 mb-4">
                                    <div class="bg-green-100 p-2 rounded-lg">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-600"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                        </svg>
                                    </div>
                                    <h4 class="text-lg font-bold text-gray-800">Misi</h4>
                                </div>

                                <div>
                                    <div class="space-y-3">
                                        @php
                                            $misiList = is_array($item->misi)
                                                ? $item->misi
                                                : explode("\n", $item->misi);
                                            $counter = 1;
                                        @endphp
                                        @foreach ($misiList as $misi)
                                            @if (trim($misi))
                                                <div
                                                    class="flex items-start gap-3 bg-gray-50 p-4 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                                    <div
                                                        class="flex-shrink-0 w-8 h-8 **bg-green-600** rounded-full flex items-center justify-center">
                                                        <span
                                                            class="**text-white** text-base font-bold">{{ $counter }}</span>
                                                    </div>
                                                    <span class="text-gray-700 pt-1 flex-1">{{ trim($misi) }}</span>
                                                </div>
                                                @php $counter++; @endphp
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>

                            <!-- Footer Card dengan Action Buttons -->
                            <div class="bg-gray-50 px-6 py-4 border-t border-gray-200">
                                <div class="flex flex-wrap justify-end gap-3">
                                    <!-- Edit Button -->
                                    <a href="{{ route('visi-misi.edit', $item->id) }}"
                                        class="inline-flex items-center gap-2 **bg-yellow-500 hover:bg-yellow-600 text-white** px-5 py-3 rounded-lg shadow-md font-semibold transition-all duration-300 transform hover:scale-105">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 **text-white**"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                        <span class="**text-white**">Edit</span>
                                    </a>

                                    <!-- Delete Button -->
                                    <form action="{{ route('visi-misi.destroy', $item->id) }}" method="POST"
                                        class="inline-block"
                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white px-5 py-3 rounded-lg shadow-md font-semibold transition-all duration-300 transform hover:scale-105">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-white"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                                stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            <span class="text-white">Hapus</span>
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    @empty
                        <!-- Empty State -->
                        <div class="col-span-full">
                            <div class="bg-white rounded-2xl shadow-lg p-12 text-center">
                                <div
                                    class="w-24 h-24 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-400"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                    </svg>
                                </div>
                                <h3 class="text-xl font-semibold text-gray-800 mb-2">Belum Ada Data</h3>
                                <p class="text-gray-600 mb-6">Mulai tambahkan data visi dan misi sekolah Anda</p>
                                <a href="{{ route('visi-misi.create') }}"
                                    class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg transition-all duration-300 transform hover:scale-105">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 4v16m8-8H4" />
                                    </svg>
                                    Tambah Data Pertama
                                </a>
                            </div>
                        </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
