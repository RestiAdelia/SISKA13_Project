<x-app-layout>
     @include('components.alert-success')

     <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Data Staf & Guru') }}
            </h2>
        </div>
    </x-slot>


    <div class="p-6 bg-gray-50 min-h-screen" x-data="{ search: '' }">

        <div class="mb-10">
            <div class="text-center mb-10">
                <h2 class="font-bold text-3xl text-black border-b-2 border-pink-600 pb-3 **w-1/2** **mx-auto**">
                    Data Guru dan Staf
                </h2>
            </div>
        </div>

        <div class="flex items-center justify-between mb-6 gap-3">

            {{-- Input Search --}}
            <div class="flex-1 max-w-md w-full">
                <input type="text" x-model="search" placeholder="🔍 Cari nama, NIP, atau jabatan..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
            </div>
            @if(Auth::user()->role !== 'orangtua')
            <div>
                <a href="{{ route('guru_dan_staff.create') }}"
                    class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105">
                    ➕ Tambah Data
                </a>

            </div>
            @endif
        </div>

        {{-- TABEL DATA --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full border border-gray-200 text-sm text-gray-700 table-auto">
                <thead class="bg-gray-100 text-gray-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Foto</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">NIP</th>
                        <th class="px-4 py-2 border">Jenis Kelamin</th>
                        <th class="px-4 py-2 border">Jabatan</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($data as $index => $pegawai)
                        <tr class="border hover:bg-gray-50 text-center"
                            x-show="
                                '{{ strtolower($pegawai->nama) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($pegawai->nip) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($pegawai->jabatan) }}'.includes(search.toLowerCase())
                            ">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2">
                                @if ($pegawai->foto)
                                    <img src="{{ asset('uploads/' . $pegawai->foto) }}"
                                        class="w-12 h-12 rounded-full object-cover mx-auto">
                                @else
                                    <img src="{{ asset('images/default-user.png') }}"
                                        class="w-12 h-12 rounded-full object-cover mx-auto">
                                @endif
                            </td>
                            <td class="px-4 py-2">{{ $pegawai->nama }}</td>
                            <td class="px-4 py-2">{{ $pegawai->nip }}</td>
                            <td class="px-4 py-2">{{ $pegawai->jenis_kelamin }}</td>
                            <td class="px-4 py-2">{{ $pegawai->jabatan }}</td>
                            <td class="px-4 py-2 flex justify-center items-center gap-2">
                                {{-- Tombol Lihat --}}
                                <a href="{{ route('guru_dan_staff.show', $pegawai->id) }}"
                                    class="px-3 py-1 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition inline-flex items-center gap-1">
                                    <i class="fa-solid fa-eye"></i>
                                </a>

                                @if(Auth :: user ()-> role !== 'orangtua')
                                {{-- Tombol Edit --}}
                                <a href="{{ route('guru_dan_staff.edit', $pegawai->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition inline-flex items-center gap-1">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <form action="{{ route('guru_dan_staff.destroy', $pegawai->id) }}" method="POST"
                                    class="delete-form inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button"
                                        class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition inline-flex items-center gap-1 btn-delete">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-gray-500 py-4">Tidak ada data tersedia</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
