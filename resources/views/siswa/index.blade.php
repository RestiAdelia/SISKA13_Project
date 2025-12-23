<x-app-layout>
     @include('components.alert-success');
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl md:text-3xl text-gray-800 leading-tight">
                {{ __('Data Siswa') }}
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-[#560029] transition-colors">Dashboard</a></li>
                    <li>/</li>
                    <li class="font-medium text-gray-900">Data Siswa</li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" x-data="{ search: '' }">

            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">

                {{-- Toolbar --}}
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex flex-col lg:flex-row gap-4 justify-between items-center">

                    <form id="filterForm" method="GET" action="{{ route('siswa.index') }}"
                        class="w-full lg:flex-1 flex flex-col sm:flex-row gap-3">

                        {{-- Search --}}
                        <div class="relative flex-1">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-magnifying-glass text-gray-400"></i>
                            </div>

                            <input id="searchInput" type="text" x-model="search"
                                placeholder="Cari nama, NIPD atau NISN..."
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2.5">
                        </div>

                        {{-- Filter Tahun --}}
                        <div class="sm:w-40 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-regular fa-calendar text-gray-400"></i>
                            </div>
                            <select name="tahun_ajar" onchange="document.getElementById('filterForm').submit()"
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2.5 cursor-pointer bg-white">
                                <option value="">Semua Tahun</option>
                                @foreach ($tahunAjarList as $ta)
                                    <option value="{{ $ta }}" {{ request('tahun_ajar') == $ta ? 'selected' : '' }}>
                                        {{ $ta }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Filter Kelas --}}
                        <div class="sm:w-48 relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-chalkboard text-gray-400"></i>
                            </div>
                            <select name="kelas_id" onchange="document.getElementById('filterForm').submit()"
                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2.5 cursor-pointer bg-white">
                                <option value="">Semua Kelas</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>

                    {{-- Tombol Tambah --}}
                     @if(Auth::user()->role !== 'orangtua')
                    <div class="w-full lg:w-auto flex justify-end">
                        <a href="{{ route('siswa.create') }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 bg-[#560029] hover:bg-[#3f0020] text-white text-sm font-medium rounded-lg shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-0.5 focus:ring-2 focus:ring-offset-2 focus:ring-[#560029]">
                            <i class="fa-solid fa-user-plus mr-2"></i> Tambah Siswa
                        </a>
                    </div>
                    @endif
                </div>

                {{-- Tabel --}}
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-100/80 border-b">
                            <tr>
                                <th class="px-6 py-4 font-bold text-center w-16">No</th>
                                <th class="px-6 py-4 font-bold">Nama Siswa</th>
                                <th class="px-6 py-4 font-bold">NIPD</th>
                                <th class="px-6 py-4 font-bold">NISN</th>
                                <th class="px-6 py-4 font-bold text-center">L/P</th>
                                 @if(Auth::user()->role !== 'orangtua')
                                <th class="px-6 py-4 font-bold text-center w-40">Aksi</th>
                                @endif
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-100">
                            @forelse ($siswa as $index => $s)
                                <tr class="bg-white hover:bg-gray-50 transition-colors duration-200"
                                    data-search="{{ strtolower($s->nama_siswa . ' ' . $s->nipd . ' ' . $s->nisn) }}"
                                    x-show="$el.dataset.search.includes(search.toLowerCase())">

                                    <td class="px-6 py-4 text-center font-medium text-gray-500">
                                        {{ $siswa->firstItem() + $index }}
                                    </td>

                                    <td class="px-6 py-4 font-semibold text-gray-800">
                                        {{ $s->nama_siswa }}
                                    </td>

                                    <td class="px-6 py-4 font-mono text-gray-600">
                                        {{ $s->nipd }}
                                    </td>

                                    <td class="px-6 py-4 font-mono text-gray-600">
                                        {{ $s->nisn }}
                                    </td>

                                    <td class="px-6 py-4 text-center">
                                        @if ($s->jenis_kelamin == 'Laki-laki')
                                            <span class="inline-flex w-8 h-8 items-center justify-center rounded-full bg-blue-100 text-blue-600 font-bold text-xs">L</span>
                                        @else
                                            <span class="inline-flex w-8 h-8 items-center justify-center rounded-full bg-pink-100 text-pink-600 font-bold text-xs">P</span>
                                        @endif
                                    </td>

                                      @if(Auth::user()->role !== 'orangtua')
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('siswa.show', $s->id) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-blue-500 hover:bg-blue-50 hover:text-blue-700 transition">
                                                <i class="fa-solid fa-eye"></i>
                                            </a>


                                            <a href="{{ route('siswa.edit', $s->id) }}"
                                                class="w-8 h-8 flex items-center justify-center rounded-lg text-amber-500 hover:bg-amber-50 hover:text-amber-600 transition">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </a>

                                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button"
                                                    class="btn-delete w-8 h-8 flex items-center justify-center rounded-lg text-red-500 hover:bg-red-50 hover:text-red-600 transition">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </button>
                                            </form>
                                            @endif
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-10 text-center text-gray-500">
                                        <i class="fa-solid fa-user-slash text-4xl text-gray-300 mb-3"></i>
                                        <p class="text-base font-medium">Belum ada data siswa.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                @if ($siswa->hasPages())
                    <div class="p-4 border-t border-gray-100 bg-gray-50">
                        {{ $siswa->appends(request()->query())->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


</x-app-layout>
