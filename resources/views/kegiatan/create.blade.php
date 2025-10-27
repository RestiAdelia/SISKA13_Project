<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Tambah Kegiatan Baru') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan" class="w-full border-gray-300 rounded-lg shadow-sm"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan" class="w-full border-gray-300 rounded-lg shadow-sm"
                        required>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi Kegiatan</label>
                    <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm"></textarea>
                </div>

                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Gambar Kegiatan</label>
                    <input type="file" name="gambar_kegiatan" class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>

                <div class="flex justify-end gap-4">
                    <a href="{{ route('kegiatan.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
