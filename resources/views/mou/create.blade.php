<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-extrabold text-3xl text-gray-900 leading-tight">
                Tambah Data MoU
            </h2>
           
        </div>
    </x-slot>

    <div class="bg-gray-50 min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-2xl p-8 lg:p-12 border border-gray-100">

            <form action="{{ route('mou.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
                @csrf

                <p class="text-sm text-gray-500 border-b pb-4">
                    Mohon lengkapi semua bidang wajib (*) di bawah ini untuk menyimpan data Memorandum of Understanding (MoU) baru.
                </p>

                <!-- Field Group: Judul, Jenis, Instansi -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Judul MoU -->
                    <div>
                        <label for="judul_mou" class="block text-sm font-semibold text-gray-700 mb-2">Judul MoU *</label>
                        <input type="text"
                               id="judul_mou"
                               name="judul_mou"
                               value="{{ old('judul_mou') }}"
                               class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                               required>
                        @error('judul_mou')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Jenis Kerjasama -->
                    <div>
                        <label for="jenis_kerjasama" class="block text-sm font-semibold text-gray-700 mb-2">Jenis Kerjasama *</label>
                        <input type="text"
                               id="jenis_kerjasama"
                               name="jenis_kerjasama"
                               value="{{ old('jenis_kerjasama') }}"
                               class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                               required>
                        @error('jenis_kerjasama')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Nama Instansi -->
                    <div class="md:col-span-2">
                        <label for="nama_instansi" class="block text-sm font-semibold text-gray-700 mb-2">Nama Instansi Mitra *</label>
                        <input type="text"
                               id="nama_instansi"
                               name="nama_instansi"
                               value="{{ old('nama_instansi') }}"
                               class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                               required>
                        @error('nama_instansi')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- Field Group: Tanggal Mulai & Berakhir -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <!-- Tanggal Mulai -->
                    <div>
                        <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Mulai *</label>
                        <input type="date"
                               id="tanggal_mulai"
                               name="tanggal_mulai"
                               value="{{ old('tanggal_mulai') }}"
                               class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                               required>
                        @error('tanggal_mulai')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Tanggal Berakhir -->
                    <div>
                        <label for="tanggal_berakhir" class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Berakhir *</label>
                        <input type="date"
                               id="tanggal_berakhir"
                               name="tanggal_berakhir"
                               value="{{ old('tanggal_berakhir') }}"
                               class="w-full border-gray-300 rounded-xl shadow-sm focus:border-black focus:ring-black"
                               required>
                        @error('tanggal_berakhir')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                </div>

                <!-- File Upload -->
                <div>
                    <label for="file" class="block text-sm font-semibold text-gray-700 mb-2">Unggah File MoU (PDF/Dokumen)</label>
                    <input type="file"
                           id="file"
                           name="file"
                           class="w-full block text-sm text-gray-500
                                  file:mr-4 file:py-2 file:px-4
                                  file:rounded-full file:border-0
                                  file:text-sm file:font-semibold
                                  file:bg-blue-50 file:text-blue-700
                                  hover:file:bg-blue-100 cursor-pointer
                                  border border-gray-300 rounded-xl p-3
                                  focus:border-black focus:ring-black">
                    @error('file')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-2 text-xs text-gray-500">Max ukuran file: 5MB. Format: PDF, DOCX.</p>
                </div>

                <!-- Submit Button -->
                <div class="pt-4 border-t flex gap-3">
                    <button type="submit"
                            class="bg-[#560029] hover:bg-[#3f0020] text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-300">
                        Simpan Data MoU
                    </button>

                    <a href="{{ route('mou.index') }}"
                       class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                        Cancel
                    </a>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>
