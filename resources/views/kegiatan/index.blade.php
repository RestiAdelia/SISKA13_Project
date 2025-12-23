<x-app-layout>
     @include('components.alert-success');
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Kegiatan Sekolah') }}
        </h2>
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

                                {{-- Tombol Edit --}}
                                <a href="{{ route('kegiatan.edit', $item->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition inline-flex items-center gap-1">
                                    ✏️
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                    class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition inline-flex items-center gap-1 btn-delete">
                                        🗑️
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
