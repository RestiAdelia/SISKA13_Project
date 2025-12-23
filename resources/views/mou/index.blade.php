<x-app-layout>
    @include('components.alert-success')
    {{-- Header Section --}}
    <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Data MoU') }}
            </h2>
        </div>
    </x-slot>
    <div class="p-6 bg-gray-50 min-h-screen" x-data="{ searchTerm: '' }">

        {{-- notif succes --}}
        @if (session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl shadow-md" role="alert">
                <div class="flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <p class="font-medium">{{ session('success') }}</p>
                </div>
            </div>
        @endif
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
            <!-- Search Input -->
            <div class="w-full sm:w-1/3">
                <div class="relative">
                    <input x-model="searchTerm" type="text" placeholder="Cari Judul, Instansi, atau Status..."
                        class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-xl focus:ring-red-900 focus:border-red-900 shadow-sm transition duration-150">
                    <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Tombol Tambah -->
            <a href="{{ route('mou.create') }}"
                class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105">
                <span class="text-xl leading-none mr-1 align-middle">+</span> Tambah MoU
            </a>
        </div>
        {{-- dekstop view --}}
        <div class="bg-white shadow-xl rounded-2xl overflow-hidden p-0">
            <div class="hidden lg:block overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50 border-b border-gray-200">
                        <tr class="text-gray-600 uppercase text-sm leading-normal">
                            <th class="py-3 px-4 text-center font-bold tracking-wider">No</th>
                            <th class="py-3 px-4 text-left font-bold tracking-wider">Judul</th>
                            <th class="py-3 px-4 text-left font-bold tracking-wider">Instansi</th>
                            <th class="py-3 px-4 text-left font-bold tracking-wider">Mulai</th>
                            <th class="py-3 px-4 text-left font-bold tracking-wider">Berakhir</th>
                            <th class="py-3 px-4 text-left font-bold tracking-wider">Waktu</th>
                            <th class="py-3 px-4 text-center font-bold tracking-wider">Status</th>
                            <th class="py-3 px-4 text-center font-bold tracking-wider">File</th>
                            <th class="py-3 px-4 text-center font-bold tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-700 text-sm font-normal divide-y divide-gray-100">
                        @forelse ($data as $item)
                            @php

                                $searchableText = strtolower(
                                    $item->judul_mou . ' ' . $item->nama_instansi . ' ' . $item->status,
                                );
                            @endphp
                            <tr class="hover:bg-gray-50 transition duration-150 ease-in-out"
                                x-show="searchTerm === '' || '{{ $searchableText }}'.includes(searchTerm.toLowerCase())">
                                <td class="py-3 px-4 text-center font-medium">{{ $loop->iteration }}</td>
                                <td class="py-3 px-4 max-w-xs truncate font-medium text-gray-800">{{ $item->judul_mou }}
                                </td>
                                <td class="py-3 px-4">{{ $item->nama_instansi }}</td>
                                <td class="py-3 px-4 text-xs">
                                    {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}

                                <td class="py-3 px-4 text-xs">
                                    {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->translatedFormat('d F Y') }}

                                <td class="py-3 px-4 text-xs text-gray-500">{{ $item->jangka_waktu }}</td>

                                {{-- Status --}}
                                <td class="py-3 px-4 text-center">
                                    @php
                                        $color =
                                            [
                                                'Aktif' => 'bg-green-100 text-green-800 ring-green-500',
                                                'Selesai' => 'bg-red-100 text-red-800 ring-red-500',
                                                'Belum Dimulai' => 'bg-blue-100 text-blue-800 ring-blue-500',
                                                'Tidak Diketahui' => 'bg-gray-100 text-gray-800 ring-gray-500',
                                            ][$item->status] ?? 'bg-gray-100 text-gray-800 ring-gray-500';
                                    @endphp
                                    <span
                                        class="inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium ring-1 ring-inset {{ $color }}">
                                        {{ $item->status }}
                                    </span>
                                </td>

                                {{-- File Link --}}
                                <td class="py-3 px-4 text-center">
                                    @if ($item->file)
                                        <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                            class="text-blue-600 hover:text-blue-700 font-medium flex items-center justify-center gap-1">
                                            <i class="bi bi-eye-fill text-lg"></i>
                                            <span>Lihat</span>
                                        </a>
                                    @else
                                        <span class="text-gray-400">-</span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="py-3 px-4 text-center">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('mou.edit', $item->id) }}"
                                            class="p-2 bg-yellow-500 text-white rounded-lg text-xs font-medium hover:bg-yellow-600 transition shadow-sm"
                                            title="Edit">
                                            <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z">
                                                </path>
                                            </svg>
                                        </a>

                                        <form action="{{ route('mou.destroy', $item->id) }}" method="POST"
                                            class="delete-form">
                                            @csrf
                                            @method('DELETE')

                                            <button type="button"
                                                class="btn-delete p-2 bg-red-600 text-white rounded-lg text-xs font-medium hover:bg-red-700 transition shadow-sm"
                                                title="Hapus">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2"
                                                        d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                    </path>
                                                </svg>
                                            </button>
                                        </form>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <tr x-show="searchTerm === ''">
                                <td colspan="9" class="text-center p-8 text-gray-500 text-base">
                                    <svg class="w-12 h-12 mx-auto mb-3 text-gray-300" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                                        </path>
                                    </svg>
                                    <p class="font-medium">Belum ada data MoU yang tercatat.</p>
                                </td>
                            </tr>
                            <tr x-show="searchTerm !== ''">
                                <td colspan="9" class="text-center p-8 text-gray-500 text-base">
                                    <p class="font-medium">Tidak ada hasil ditemukan untuk pencarian "<span
                                            x-text="searchTerm" class="font-semibold text-gray-800"></span>".</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- view mobile --}}

            <div class="lg:hidden p-4 space-y-4">
                @forelse ($data as $item)
                    @php

                        $searchableText = strtolower(
                            $item->judul_mou . ' ' . $item->nama_instansi . ' ' . $item->status,
                        );
                    @endphp
                    <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-4 space-y-3"
                        x-show="searchTerm === '' || '{{ $searchableText }}'.includes(searchTerm.toLowerCase())">

                        <div class="flex justify-between items-start border-b pb-2">

                            <p class="text-lg font-bold text-gray-900 leading-tight pr-2">
                                {{ $loop->iteration }}. {{ $item->judul_mou }}
                            </p>
                            @php
                                $color =
                                    [
                                        'Aktif' => 'bg-green-100 text-green-800 ring-green-500',
                                        'Selesai' => 'bg-red-100 text-red-800 ring-red-500',
                                        'Belum Dimulai' => 'bg-blue-100 text-blue-800 ring-blue-500',
                                        'Tidak Diketahui' => 'bg-gray-100 text-gray-800 ring-gray-500',
                                    ][$item->status] ?? 'bg-gray-100 text-gray-800 ring-gray-500';
                            @endphp
                            <span
                                class="flex-shrink-0 inline-flex items-center px-3 py-0.5 rounded-full text-xs font-medium ring-1 ring-inset {{ $color }}">
                                {{ $item->status }}
                            </span>
                        </div>

                        <div class="grid grid-cols-2 gap-y-2 text-sm text-gray-700 font-normal">
                            <div class="font-medium text-gray-500">Instansi:</div>
                            <div class="text-right font-semibold">{{ $item->nama_instansi }}</div>

                            <div class="font-medium text-gray-500">Mulai:</div>
                            <div class="text-right">
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->translatedFormat('d F Y') }}

                            </div>

                            <div class="font-medium text-gray-500">Berakhir:</div>
                            <div class="text-right">
                                {{ \Carbon\Carbon::parse($item->tanggal_berakhir)->translatedFormat('d F Y') }}
                            </div>

                            <div class="font-medium text-gray-500">Jangka Waktu:</div>
                            <div class="text-right">{{ $item->jangka_waktu }}</div>
                        </div>

                        <div class="pt-3 flex justify-between items-center border-t border-dashed border-gray-200">
                            {{-- File Link Mobile --}}
                            <div class="text-sm">
                                @if ($item->file)
                                    <a href="{{ asset('storage/' . $item->file) }}" target="_blank"
                                        class="text-blue-600 hover:text-blue-700 font-medium flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                            </path>
                                        </svg>
                                        Lihat File
                                    </a>
                                @else
                                    <span class="text-gray-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Tidak Ada File
                                    </span>
                                @endif
                            </div>

                            {{-- Aksi Mobile --}}
                            <div class="flex space-x-2">
                                <a href="{{ route('mou.edit', $item->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-lg text-xs font-medium hover:bg-yellow-600 transition shadow-sm">
                                    Edit
                                </a>
                                <form action="{{ route('mou.destroy', $item->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus data MoU ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white rounded-lg text-xs font-medium hover:bg-red-700 transition shadow-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- Empty State for Mobile (shown only if search is empty, or if there is no data at all) --}}
                    <div class="text-center p-12 text-gray-500" x-show="searchTerm === ''">
                        <svg class="w-12 h-12 mx-auto text-gray-300" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                            </path>
                        </svg>
                        <p class="mt-2 text-lg font-medium">Belum ada data MoU yang tercatat.</p>
                        <p class="text-sm">Silakan tambahkan data baru menggunakan tombol di atas.</p>
                    </div>
                    <!-- Empty search result message for mobile -->
                    <div class="text-center p-12 text-gray-500" x-show="searchTerm !== ''">
                        <p class="font-medium">Tidak ada hasil ditemukan untuk pencarian "<span x-text="searchTerm"
                                class="font-semibold text-gray-800"></span>".</p>
                    </div>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
<script src="//unpkg.com/alpinejs" defer></script>
