<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Manajemen Kelas') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen" x-data="{ search: '' }">
        {{-- Notifikasi sukses --}}
        @if (session('success'))
            <div class="bg-green-100 text-green-800 border border-green-300 px-4 py-2 rounded mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Header dan Search --}}
        <div class="flex items-center justify-between mb-6 gap-3">
            {{-- Input Pencarian --}}
            <div class="flex-1 max-w-md w-full">
                <input type="text" x-model="search" placeholder="🔍 Cari nama kelas atau guru pengampu..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
            </div>

            {{-- Tombol Tambah --}}
            <div>
                <a href="{{ route('kelas.create') }}"
                    class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105">
                    ➕ Tambah Kelas
                </a>
            </div>
        </div>

        {{-- Tabel Data Kelas --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full border border-gray-200 text-sm text-gray-700 table-auto">
                <thead class="bg-gray-100 text-gray-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border text-left">Nama Kelas</th>
                        <th class="px-4 py-2 border text-left">Wali Kelas</th>
                        <th class="px-4 py-2 border text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $index => $k)
                        <tr class="border hover:bg-gray-50"
                            x-show="
                                '{{ strtolower($k->nama_kelas) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($k->guru->nama ?? '') }}'.includes(search.toLowerCase())
                            ">
                            <td class="px-4 py-2 text-center">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 font-medium">{{ $k->nama_kelas }}</td>
                            <td class="px-4 py-2">{{ $k->guru->nama ?? '-' }}</td>
                            <td class="px-4 py-2 text-center space-x-2">
                                {{-- Tombol Edit --}}
                                <a href="{{ route('kelas.edit', $k->id) }}"
                                    class="inline-flex items-center justify-center w-8 h-8 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition"
                                    title="Edit">
                                    <i class="fa-solid fa-pen-to-square text-base"></i>
                                </a>

                                {{-- Tombol Hapus --}}
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST"
                                    class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="btn-delete inline-flex items-center justify-center w-8 h-8 bg-red-600 text-white rounded-md hover:bg-red-700 transition"
                                        title="Hapus">
                                        <i class="fa-solid fa-trash text-base"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-gray-500">Belum ada data kelas</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="mt-4">
            {{ $kelas->links() }}
        </div>


        <script src="//unpkg.com/alpinejs" defer></script>
    </div>
</x-app-layout>
