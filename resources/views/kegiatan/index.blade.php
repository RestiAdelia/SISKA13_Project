<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Kegiatan Sekolah') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Header Section -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4">
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Manajemen Kegiatan Sekolah</h1>
                    <p class="text-gray-600 mt-1">Kelola daftar kegiatan sekolah Anda</p>
                </div>
                <a href="{{ route('kegiatan.create') }}"
                    class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md transition-all duration-300 transform hover:scale-105">
                    ➕ Tambah Kegiatan
                </a>
            </div>

            <!-- Table Section -->
            <div class="bg-white shadow-lg rounded-xl overflow-hidden">
                <table class="min-w-full table-auto border-collapse">
                    <thead class="bg-gray-100 border-b">
                        <tr>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">No</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">Nama Kegiatan</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">Tanggal</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">Deskripsi</th>
                            <th class="px-6 py-4 text-left text-gray-600 font-semibold">Gambar</th>
                            <th class="px-6 py-4 text-center text-gray-600 font-semibold">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($kegiatan as $index => $item)
                            <tr class="border-b hover:bg-gray-50 transition">
                                <td class="px-6 py-4 text-gray-800">{{ $index + 1 }}</td>
                                <td class="px-6 py-4 font-medium text-gray-900">{{ $item->nama_kegiatan }}</td>
                                <td class="px-6 py-4 text-gray-700">
                                    {{ \Carbon\Carbon::parse($item->tanggal_kegiatan)->translatedFormat('d F Y') }}
                                </td>
                                <td class="px-6 py-4 text-gray-700 max-w-sm truncate">{{ $item->deskripsi }}</td>
                                <td class="px-6 py-4">
                                    @if ($item->gambar_kegiatan)
                                        <img src="{{ asset('storage/' . $item->gambar_kegiatan) }}"
                                            class="w-20 h-20 object-cover rounded-lg border" alt="Gambar">
                                    @else
                                        <span class="text-gray-400 italic">Tidak ada</span>
                                    @endif
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
            <!-- Pagination -->
            @if ($kegiatan->hasPages())
                <div class="p-6 border-t bg-gray-50 flex justify-center">
                    {{ $kegiatan->links() }}
                </div>
            @endif
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButtons = document.querySelectorAll('.btn-delete');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const form = this.closest('.delete-form');

                    Swal.fire({
                        title: 'Yakin ingin menghapus?',
                        text: "Data kegiatan ini akan dihapus permanen!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Ya, hapus!',
                        cancelButtonText: 'Batal'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>

</x-app-layout>
