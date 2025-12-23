<x-app-layout>
    @include('components.alert-success')
    <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Data Kegiatan') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen" x-data="{ search: '' }">


        {{-- Judul Halaman --}}
        <div class="mb-10">
            <div class="text-center mb-10">
                <h2 class="font-bold text-3xl text-black border-b-2 border-pink-600 pb-3 w-1/2 mx-auto">
                    Data Kegiatan Sekolah
                </h2>
            </div>
        </div>

        {{-- Search & Tombol Tambah --}}
        <div class="flex items-center justify-between mb-6 gap-3">

            <div class="flex-1 max-w-md w-full">
                <input type="text" x-model="search" placeholder="🔍 Cari nama kegiatan..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
            </div>

            @if(Auth::user()->role !== 'orangtua')
            <a href="{{ route('kegiatan.create') }}"
                class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105">
                ➕ Tambah Kegiatan
            </a>
            @endif

        </div>

        {{-- Tabel Data Kegiatan --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full border border-gray-200 text-sm text-gray-700 table-auto">
                <thead class="bg-gray-100 text-gray-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama Kegiatan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Deskripsi</th>
                        <th class="px-4 py-2 border">Gambar</th>
                        <th class="px-4 py-2 border">Diupdate Oleh</th>
                        @if(Auth::user()->role !== 'orangtua')
                        <th class="px-4 py-2 border">Aksi</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kegiatan as $index => $item)
                        <tr class="border hover:bg-gray-50 text-center"
                            x-show=" '{{ strtolower($item->nama_kegiatan) }}'.includes(search.toLowerCase()) ">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>

                            <td class="px-4 py-2 font-medium text-gray-900">
                                {{ $item->nama_kegiatan }}
                            </td>

                            <td class="px-4 py-2 text-gray-700">
                                {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('d F Y') }}
                            </td>

                            <td class="px-4 py-2 text-gray-700 text-left whitespace-normal break-words max-w-xs">
                                {{ $item->deskripsi }}
                            </td>

                            <td class="px-4 py-2">
                                @if ($item->gambar_kegiatan)
                                    <img src="{{ asset('storage/' . $item->gambar_kegiatan) }}"
                                        class="w-14 h-14 object-cover rounded-md mx-auto border">
                                @else
                                    <span class="text-gray-400 italic">Tidak ada</span>
                                @endif
                            </td>

                            <td class="px-4 py-2">
                                {{ $item->updated_by ?? 'Belum Ada' }}
                            </td>

                            @if(Auth::user()->role !== 'orangtua')
                            <td class="px-4 py-2 flex justify-center items-center gap-2">

                                {{-- Tombol Edit (Warna Gold/Amber Mewah) --}}
                                <a href="{{ route('kegiatan.edit', $item->id) }}"
                                    class="p-2 bg-amber-500 text-white rounded-xl hover:bg-amber-600 transition-all duration-300 shadow-lg shadow-amber-500/20 group"
                                    title="Edit Kegiatan">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 transition-transform duration-300 group-hover:scale-110"
                                        fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>

                                {{-- Tombol Hapus (Warna Maroon Mewah) --}}
                                <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                    class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="btn-delete p-2 bg-[#800000] text-white rounded-xl hover:bg-black transition-all duration-300 shadow-lg shadow-maroon/20 group"
                                        title="Hapus Kegiatan">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="w-5 h-5 transition-transform duration-300 group-hover:scale-110"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>

                            </td>
                            @endif
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">
                                Tidak ada kegiatan tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($kegiatan->hasPages())
            <div class="p-6 border-t bg-gray-50 flex justify-center">
                {{ $kegiatan->links() }}
            </div>
        @endif

    </div>

    {{-- AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>

</x-app-layout>
