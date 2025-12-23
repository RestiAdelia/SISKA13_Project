{{-- resources/views/kelas/index.blade.php --}}
<x-app-layout>
     @include('components.alert-success');

    {{-- AlpineJS --}}
    @push('scripts')
        <script src="//unpkg.com/alpinejs" defer></script>
    @endpush

    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl md:text-3xl text-gray-800 leading-tight">
                {{ __('Manajemen Data Kelas') }}
            </h2>

            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-[#560029] transition-colors">Data Kelas</a></li>
                    <li>/</li>
                    <li class="font-medium text-gray-900">Data Kelas</li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-10" x-data="{ search: '' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

                {{-- FILTER --}}
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex flex-col lg:flex-row gap-4 justify-between items-center">

                    <form
                        x-ref="form"
                        id="filterForm"
                        method="GET"
                        action="{{ route('kelas.index') }}"
                        class="w-full lg:flex-1 flex flex-col sm:flex-row gap-3"
                    >

                        {{-- Input Search (Realtime) --}}
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                            </div>

                            <input type="text"
                                placeholder="Cari kelas, guru..."
                                x-model="search"
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring
                                       focus:ring-[#560029]/20 transition shadow-sm text-sm py-2.5">
                        </div>

                        {{-- Dropdown Tahun --}}
                        <div class="sm:w-48">
                            <select name="tahun_ajar"
                                onchange="document.getElementById('filterForm').submit()"
                                class="w-full rounded-lg border-gray-300 focus:border-[#560029]
                                       focus:ring focus:ring-[#560029]/20 shadow-sm text-sm py-2.5 cursor-pointer bg-white">
                                <option value="">Semua Tahun</option>
                                @foreach ($daftar_tahun as $tahun)
                                    <option value="{{ $tahun }}" @selected(request('tahun_ajar') == $tahun)>
                                        Tahun {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                    </form>

                    {{-- Tombol Tambah --}}
                    @if(Auth::user()->role !== 'orangtua')
                    <div class="w-full lg:w-auto flex justify-end">
                        <a href="{{ route('kelas.create') }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 bg-[#560029] hover:bg-[#3f0020]
                                   text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition">
                            <i class="fa-solid fa-plus mr-2"></i> Tambah Kelas
                        </a>
                    </div>
                    @endif

                </div>

                {{-- TABEL --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100 border-b">
                            <tr>
                                <th class="px-6 py-4 text-center w-16">No</th>
                                <th class="px-6 py-4">Nama Kelas</th>
                                <th class="px-6 py-4">Wali Kelas / Guru</th>
                                <th class="px-6 py-4 text-center">Tahun Ajaran</th>
                                <th class="px-6 py-4 text-center">Mata Pelajaran</th>
                                @if(Auth::user()->role !== 'orangtua')
                                <th class="px-6 py-4 text-center w-32">Aksi</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">

                            @forelse ($kelas as $index => $k)
                                <tr class="bg-white hover:bg-gray-50 transition"
                                    x-show="
                                        '{{ strtolower($k->nama_kelas) }}'.includes(search.toLowerCase()) ||
                                        '{{ strtolower($k->guru->nama ?? '-') }}'.includes(search.toLowerCase()) ||
                                        '{{ strtolower($k->tahun_ajar) }}'.includes(search.toLowerCase()) ||
                                        @if(is_array($k->mata_pelajaran))
                                            '{{ strtolower(implode(',', $k->mata_pelajaran)) }}'.includes(search.toLowerCase())
                                        @else
                                            false
                                        @endif
                                    "
                                >

                                    {{-- No --}}
                                    <td class="px-6 py-4 text-center text-gray-500">
                                        {{ $kelas->firstItem() + $index }}
                                    </td>

                                    {{-- Nama --}}
                                    <td class="px-6 py-4 font-semibold text-gray-800">
                                        {{ $k->nama_kelas }}
                                    </td>

                                    {{-- Guru --}}
                                    <td class="px-6 py-4">
                                        @if ($k->guru)
                                            <div class="flex items-center gap-2">
                                                <div class="w-8 h-8 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 text-xs font-bold">
                                                    {{ substr($k->guru->nama, 0, 1) }}
                                                </div>
                                                <span>{{ $k->guru->nama }}</span>
                                            </div>
                                        @else
                                            <span class="italic text-gray-400">Belum ditentukan</span>
                                        @endif
                                    </td>

                                    {{-- Tahun --}}
                                    <td class="px-6 py-4 text-center">
                                        <span class="px-2 py-1 rounded-full text-xs bg-gray-100 text-gray-800 border">
                                            {{ $k->tahun_ajar }}
                                        </span>
                                    </td>

                                    {{-- Mapel --}}
                                    <td class="px-6 py-4">
                                        @if (is_array($k->mata_pelajaran) && count($k->mata_pelajaran))
                                            <div class="flex flex-wrap gap-1.5">
                                                @foreach ($k->mata_pelajaran as $mapel)
                                                    <span class="px-2 py-1 bg-[#560029]/10 text-[#560029]
                                                                 rounded-md text-xs border border-[#560029]/20">
                                                        {{ $mapel }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        @else
                                            <span class="text-gray-400 text-xs italic">Tidak ada mapel</span>
                                        @endif
                                    </td>

                                    {{-- Aksi --}}
                                    @if(Auth::user()->role !== 'orangtua')
                                    <td class="px-6 py-4 text-center">
                                        <a href="{{ route('kelas.edit', $k->id) }}"
                                            class="inline-block text-amber-600 hover:text-amber-700 mr-2">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>

                                        <form action="{{ route('kelas.destroy', $k->id) }}"
                                            method="POST" class="delete-form inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="text-red-600 hover:text-red-700 btn-delete">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                    @endif
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                        <i class="fa-solid fa-folder-open text-4xl text-gray-300 mb-3"></i>
                                        <p class="font-medium">Data kelas tidak ditemukan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($kelas->hasPages())
                    <div class="p-4 border-t border-gray-100 bg-gray-50">
                        {{ $kelas->appends(request()->query())->links() }}
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-app-layout>
