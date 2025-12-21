<x-app-layout>
     <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Edit Data MoU') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-gray-50 min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-2xl p-8 lg:p-12 border border-gray-100">

            <form action="{{ route('mou.update', $mou->id) }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf
                @method('PUT')

                <p class="text-sm text-gray-500 border-b pb-4">
                    Perbarui informasi MoU di bawah ini. Bidang bertanda bintang (*) wajib diisi.
                </p>

                <!-- Group 1 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Judul -->
                    <div>
                        <label for="judul_mou" class="block text-sm font-semibold text-gray-700 mb-2">Judul MoU *</label>
                        <input type="text"
                            id="judul_mou"
                            name="judul_mou"
                            value="{{ old('judul_mou', $mou->judul_mou) }}"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                            placeholder="Contoh: Kerjasama Pendidikan dan Penelitian"
                            required>
                        @error('judul_mou')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis -->
                    <div>
                        <label for="jenis_kerjasama" class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kerjasama *</label>
                        <input type="text"
                            id="jenis_kerjasama"
                            name="jenis_kerjasama"
                            value="{{ old('jenis_kerjasama', $mou->jenis_kerjasama) }}"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                            placeholder="Contoh: MoA (Memorandum of Agreement)"
                            required>
                        @error('jenis_kerjasama')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Instansi -->
                    <div class="md:col-span-2">
                        <label for="nama_instansi" class="block text-sm font-semibold text-gray-700 mb-2">Nama Instansi Mitra *</label>
                        <input type="text"
                            id="nama_instansi"
                            name="nama_instansi"
                            value="{{ old('nama_instansi', $mou->nama_instansi) }}"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                            placeholder="Contoh: PT. Sinergi Digital Indonesia"
                            required>
                        @error('nama_instansi')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Group 2 -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Mulai -->
                    <div>
                        <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai *</label>
                        <input type="date"
                            id="tanggal_mulai"
                            name="tanggal_mulai"
                            value="{{ old('tanggal_mulai', \Carbon\Carbon::parse($mou->tanggal_mulai)->format('Y-m-d')) }}"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                            required>
                        @error('tanggal_mulai')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Berakhir -->
                    <div>
                        <label for="tanggal_berakhir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Berakhir *</label>
                        <input type="date"
                            id="tanggal_berakhir"
                            name="tanggal_berakhir"
                            value="{{ old('tanggal_berakhir', \Carbon\Carbon::parse($mou->tanggal_berakhir)->format('Y-m-d')) }}"
                            class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                            required>
                        @error('tanggal_berakhir')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Upload File -->
                <div>
                    <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">Unggah File MoU (Opsional)</label>

                    <input type="file"
                        id="file"
                        name="file"
                        class="w-full block text-sm text-gray-500
                               file:px-4 file:py-2 file:mr-4
                               file:rounded-full file:border-0
                               file:text-sm file:font-semibold
                               file:bg-blue-50 file:text-blue-700
                               hover:file:bg-blue-100
                               border border-gray-300 rounded-xl p-3
                               focus:border-black focus:ring-black">

                    @error('file')
                        <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                    @enderror

                    @if ($mou->file)
                    <div class="mt-4 p-3 bg-yellow-50 border border-yellow-200 rounded-lg flex justify-between items-center">
                        <span class="text-sm font-medium text-yellow-800">
                            File Saat Ini:
                            <a href="{{ asset('storage/' . $mou->file) }}" target="_blank"
                               class="text-blue-600 underline hover:text-blue-800">
                               Lihat Dokumen
                            </a>
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Submit -->
                <div class="pt-4 border-t flex gap-3">
                    <button type="submit"
                        class="bg-[#560029] hover:bg-[#3f0020] text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
                        Simpan Perubahan
                    </button>

                    <a href="{{ route('mou.index') }}"
                       class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-3 rounded-lg font-semibold transition">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>

</x-app-layout>
