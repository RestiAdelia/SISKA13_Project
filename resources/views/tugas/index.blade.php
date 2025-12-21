<x-app-layout>
       @include('components.alert-success')
   <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Daftar Tugas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ search: '' }">

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

                {{-- Toolbar Atas --}}
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex flex-col lg:flex-row gap-4 justify-between items-center">
                    
                    <form id="filterForm" method="GET" action="{{ route('tugas.index') }}"
                        class="w-full lg:flex-1 flex flex-col sm:flex-row gap-3">

                        {{-- Search --}}
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                            </div>
                            <input id="searchInput" type="text" x-model="search"
                                placeholder="Cari judul tugas..."
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2.5">
                        </div>

                        {{-- Filter Kelas --}}
                        <div class="sm:w-48 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-chalkboard text-gray-400"></i>
                            </div>
                            <select name="kelas_id" onchange="document.getElementById('filterForm').submit()"
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2.5 cursor-pointer bg-white">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelasList as $k)
                                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    {{-- Tombol Tambah --}}
                    <div class="w-full lg:w-auto flex justify-end">
                        <a href="{{ route('tugas.create') }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 bg-[#560029] hover:bg-[#3f0020] text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5">
                            <i class="fa-solid fa-plus mr-2"></i> Tambah Tugas
                        </a>
                    </div>
                </div>

                {{-- Tabel Data --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100/80 border-b">
                            <tr>
                                <th class="py-4 px-6 font-bold w-16 text-center">No</th>
                                <th class="py-4 px-6 font-bold">Judul Tugas</th>
                                <th class="py-4 px-6 font-bold">Kelas</th>
                                <th class="py-4 px-6 font-bold">Mata Pelajaran</th>
                                <th class="py-4 px-6 font-bold">Deadline</th>
                                <th class="py-4 px-6 font-bold text-center w-40">Aksi</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($tugas as $index => $item)
                                <tr class="bg-white hover:bg-gray-50 transition-colors duration-200"
                                    data-search="{{ strtolower($item->judul . ' ' . $item->mata_pelajaran) }}"
                                    x-show="$el.dataset.search.includes(search.toLowerCase())">

                                    <td class="py-4 px-6 text-center font-medium text-gray-500">
                                        {{ $tugas->firstItem() + $index }}
                                    </td>
                                    <td class="py-4 px-6 font-semibold text-gray-800">
                                        {{ $item->judul }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-medium bg-gray-100 text-gray-800 border border-gray-200">
                                            {{ $item->kelas->nama_kelas }}
                                        </span>
                                    </td>
                                    <td class="py-4 px-6 text-gray-600">
                                        {{ $item->mata_pelajaran }}
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex flex-col">
                                            <span class="font-medium text-gray-800">
                                                {{ \Carbon\Carbon::parse($item->deadline)->translatedFormat('d M Y') }}
                                            </span>
                                            <span class="text-xs text-gray-400">
                                                {{ \Carbon\Carbon::parse($item->deadline)->format('H:i') }} WIB
                                            </span>
                                        </div>
                                    </td>

                                    <td class="py-4 px-6">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('tugas.show', $item->id) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-blue-500 hover:bg-blue-50 hover:text-blue-700 transition"
                                                title="Lihat Detail">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>

                                            <a href="{{ route('tugas.edit', $item->id) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-500 hover:bg-amber-50 hover:text-amber-600 transition"
                                                title="Edit Tugas">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('tugas.destroy', $item->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn-delete w-8 h-8 flex items-center justify-center rounded-lg text-red-500 hover:bg-red-50 hover:text-red-600 transition"
                                                    title="Hapus Tugas">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="py-10 text-center text-gray-500">
                                        <div class="flex flex-col items-center justify-center">
                                            <i class="fa-solid fa-clipboard-question text-4xl text-gray-300 mb-3"></i>
                                            <p class="font-medium">Belum ada tugas.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if($tugas->hasPages())
                    <div class="p-4 border-t border-gray-100 bg-gray-50">
                        {{ $tugas->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
