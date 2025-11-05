{{-- resources/views/kelas/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Data Kelas') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 max-w-6xl mx-auto" 
         x-data="{ 
            search: '{{ request('search') }}', 
            tahunAjar: '{{ request('tahun_ajar') }}' 
         }">

        {{-- Filter & Tombol Tambah --}}
        <div class="flex flex-wrap items-center justify-between mb-6 gap-3">
            {{-- Pencarian --}}
            <div class="flex-1 max-w-md w-full">
                <form method="GET" action="{{ route('kelas.index') }}" class="flex gap-2">
                    <input 
                        type="text" 
                        name="search" 
                        x-model="search"
                        value="{{ request('search') }}"
                        placeholder="🔍 Cari nama kelas atau guru pengampu..."
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">

                    {{-- Filter Tahun Ajar --}}
                    <select 
                        name="tahun_ajar"
                        x-model="tahunAjar"
                        onchange="this.form.submit()"
                        class="border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700"
                    >
                        <option value="">Semua </option>
                        @foreach ($daftar_tahun as $tahun)
                            <option value="{{ $tahun }}" {{ request('tahun_ajar') == $tahun ? 'selected' : '' }}>
                                {{ $tahun }}
                            </option>
                        @endforeach
                    </select>
                </form>
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
        <div class="bg-white p-6 rounded-lg shadow-md border overflow-x-auto">
            <table class="min-w-full border border-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 text-left border">No</th>
                        <th class="px-4 py-2 text-left border">Nama Kelas</th>
                        <th class="px-4 py-2 text-left border">Guru Pengampu</th>
                        <th class="px-4 py-2 text-left border">Tahun Ajar</th>
                        <th class="px-4 py-2 text-center border w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($kelas as $index => $k)
                        <tr class="border-t hover:bg-gray-50 transition">
                            <td class="px-4 py-2 border">{{ $kelas->firstItem() + $index }}</td>
                            <td class="px-4 py-2 border">{{ $k->nama_kelas }}</td>
                            <td class="px-4 py-2 border">{{ $k->guru->nama ?? '-' }}</td>
                            <td class="px-4 py-2 border">{{ $k->tahun_ajar }}</td>
                            <td class="px-4 py-2 text-center space-x-2">
                                {{-- Edit --}}
                                <a href="{{ route('kelas.edit', $k->id) }}"
                                    class="px-2 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition inline-flex items-center gap-1 text-sm">
                                    <i class="fa-solid fa-pen-to-square text-xs"></i>
                                </a>

                                {{-- Hapus --}}
                                <form action="{{ route('kelas.destroy', $k->id) }}" method="POST" class="inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn-delete text-red-600 hover:text-red-800 transition text-sm" title="Hapus">
                                        <i class="fa-solid fa-trash text-xs"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data kelas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Pagination --}}
            <div class="mt-4">
                {{ $kelas->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    {{-- SweetAlert untuk Hapus --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//unpkg.com/alpinejs" defer></script>  
</x-app-layout>
