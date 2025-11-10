<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Data Siswa') }}
        </h2>
    </x-slot>

    <div class="py-8 px-4 md:px-10 max-w-7xl mx-auto" x-data="{ tahunAjar: '{{ request('tahun_ajar') }}', kelasId: '{{ request('kelas_id') }}' }">

        {{-- Filter & Tambah --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
            <form method="GET" action="{{ route('siswa.index') }}"
                class="flex flex-wrap items-center gap-3 w-full md:w-auto" x-data x-on:change="$el.submit()"
                x-on:input.debounce.500ms="$el.submit()">

                {{-- Input teks untuk search nama siswa --}}
                <input type="text" name="search" placeholder=" 🔍 Cari nama siswa..."
                    value="{{ request('search') }}"
                    class="border rounded-lg px-4 py-2 text-base focus:ring-2 focus:ring-blue-500 min-w-[200px]">

                {{-- Dropdown Tahun Ajar --}}
                <select name="tahun_ajar"
                    class="border rounded-lg px-4 py-2 text-base focus:ring-2 focus:ring-blue-500 min-w-[150px]">
                    <option value="">Semua</option>
                    @foreach ($tahunAjarList as $ta)
                        <option value="{{ $ta }}" {{ request('tahun_ajar') == $ta ? 'selected' : '' }}>
                            {{ $ta }}
                        </option>
                    @endforeach
                </select>

                {{-- Dropdown Kelas --}}
                <select name="kelas_id"
                    class="border rounded-lg px-4 py-2 text-base focus:ring-2 focus:ring-blue-500 min-w-[180px]">
                    <option value="">Semua Kelas</option>
                    @foreach ($kelas as $k)
                        <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                            {{ $k->nama_kelas }}
                        </option>
                    @endforeach
                </select>
            </form>

            {{-- Tombol Tambah --}}
            <a href="{{ route('siswa.create') }}"
                class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition duration-300 transform hover:scale-105">
                ➕ Tambah Siswa
            </a>
        </div>

        {{-- Tabel Data --}}
        <div class="bg-white p-6 rounded-lg shadow-md border overflow-x-auto">
            <table class="min-w-full border border-gray-200 text-sm">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-2 border text-center">No</th>
                        <th class="px-4 py-2 border text-center">Nama</th>
                        <th class="px-4 py-2 border text-center">NIPD</th>
                        <th class="px-4 py-2 border text-center">NISN</th>
                        <th class="px-4 py-2 border text-center">Jenis Kelamin</th>
                        <th class="px-4 py-2 border text-center w-36">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($siswa as $index => $s)
                        <tr class="border-t hover:bg-gray-50 transition  ">
                            <td class="px-4 py-2 border ">{{ $loop->iteration }}</td>
                            <td class="px-4 py-2 border">{{ $s->nama_siswa }}</td>
                            <td class="px-4 py-2 border">{{ $s->nipd }}</td>
                            <td class="px-4 py-2 border">{{ $s->nisn }}</td>
                            <td class="px-4 py-2 border">{{ $s->jenis_kelamin }}</td>

                            </td>
                            <td class="px-4 py-2 text-center flex justify-center gap-2">

                                {{-- Lihat --}}
                                <a href="{{ route('siswa.show', $s->id) }}"
                                    class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition inline-flex items-center gap-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                {{-- Edit --}}
                                <a href="{{ route('siswa.edit', $s->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition inline-flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                {{-- Hapus --}}
                                 <form action=" route('siswa.destroy', $s->id) }}" method="POST"
                                    class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition inline-flex items-center gap-1 btn-delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4 text-gray-500">Belum ada data siswa.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- Paginasi --}}
            <div class="mt-4">
                {{ $siswa->appends(request()->query())->links() }}
            </div>
        </div>
    </div>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
