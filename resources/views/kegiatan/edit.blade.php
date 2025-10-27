<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Edit Kegiatan') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-lg">
            <form action="{{ route('kegiatan.update', $kegiatan->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                {{-- Nama Kegiatan --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Nama Kegiatan</label>
                    <input type="text" name="nama_kegiatan"
                        value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Tanggal Kegiatan --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Tanggal Kegiatan</label>
                    <input type="date" name="tanggal_kegiatan"
                        value="{{ old('tanggal_kegiatan', $kegiatan->tanggal_kegiatan) }}"
                        class="w-full border-gray-300 rounded-lg shadow-sm" required>
                </div>

                {{-- Deskripsi --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm">{{ old('deskripsi', $kegiatan->deskripsi) }}</textarea>
                </div>

                {{-- Gambar Kegiatan --}}
                <div>
                    <label class="block text-gray-700 font-semibold mb-2">Gambar Kegiatan</label>
                    @if ($kegiatan->gambar_kegiatan)
                        <img src="{{ asset('storage/' . $kegiatan->gambar_kegiatan) }}"
                            class="w-32 h-32 object-cover rounded mb-3" alt="Gambar Kegiatan">
                    @endif
                    <input type="file" name="gambar_kegiatan" class="w-full border-gray-300 rounded-lg shadow-sm">
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-4">
                    <a href="{{ route('kegiatan.index') }}"
                        class="bg-gray-400 hover:bg-gray-500 text-white px-6 py-3 rounded-lg font-semibold">
                        Batal
                    </a>
                    <button type="submit"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-lg font-semibold shadow-md">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
