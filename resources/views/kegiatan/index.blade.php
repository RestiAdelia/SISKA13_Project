<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Kegiatan Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-8">
                <div class="text-center mb-10">
                    <h2 class="font-bold text-3xl text-black border-b-2 border-pink-600 pb-3 **w-1/2** **mx-auto**">
                        Kegiatan Sekolah
                    </h2>
                </div>

                <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">

                    <div class="md:w-3/4">
                        {{-- //tambahkan serch --}}
                    </div>

                    <a href="{{ route('kegiatan.create') }}"
                        class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105 flex-shrink-0">
                        ➕ Tambah Kegiatan
                    </a>
                </div>
            </div>

            <div class="bg-white shadow-lg rounded-xl **overflow-x-auto**">

                <table class="**min-w-full table-fixed** border-collapse">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold w-12">No</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold w-56">Nama Kegiatan</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold w-40">Tanggal</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold w-64 min-w-[20rem]">Deskripsi
                            </th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold w-32">Gambar</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold w-40">Diupdate Oleh</th>
                            <th class="px-6 py-4 text-center text-gray-600 font-semibold w-48">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kegiatan as $index => $item)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-800">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900 overflow-hidden text-ellipsis">
                                    {{ $item->nama_kegiatan }}</td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('d F Y') }}
                                </td>
                                <td
                                    class="px-6 py-4 text-gray-700 **whitespace-normal break-words** max-w-full text-clip overflow-hidden">
                                    {{ $item->deskripsi }}
                                </td>
                                <td class="px-6 py-4">
                                    @if ($item->gambar_kegiatan)
                                        <img src="{{ asset('storage/' . $item->gambar_kegiatan) }}"
                                            class="w-20 h-20 object-cover rounded-lg border" alt="Gambar">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
                                </td>
                                {{-- Diupdate Oleh --}}
                                <td class="px-6 py-4 text-gray-700">
                                    {{ $item->updated_by ?? 'Belum Ada' }}
                                </td>
                                <td class="px-6 py-4 text-center flex justify-center gap-3">
                                    <a href="{{ route('kegiatan.edit', $item->id) }}"
                                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200">
                                        ✏️ Edit
                                    </a>
                                    <form action="{{ route('kegiatan.destroy', $item->id) }}" method="POST"
                                        class="delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                            class="btn-delete bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg shadow-md text-sm font-semibold transition-all duration-200">
                                            🗑️ Hapus
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">
                                    Belum ada kegiatan yang ditambahkan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($kegiatan->hasPages())
                <div class="p-6 border-t bg-gray-50 flex justify-center">
                    {{ $kegiatan->links() }}
                </div>
            @endif
        </div>
    </div>

</x-app-layout>
