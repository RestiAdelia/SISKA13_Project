<x-app-layout>
   <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Data Kegiatan') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-4xl mx-auto bg-white p-10 rounded-2xl shadow-lg">

            <h2 class="text-center text-2xl font-bold mb-6 tracking-wide">Tambah Kegiatan</h2>
            <hr class="border-pink-400 mb-8">

            <form action="{{ route('kegiatan.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

                    {{-- FOTO --}}
                    <div class="flex flex-col items-center">

                        <!-- Frame Foto -->
                        <div id="preview-container"
                            class="w-60 h-60 bg-gradient-to-br from-gray-100 to-gray-200 flex flex-col items-center justify-center
                                   rounded-xl border-2 border-dashed border-gray-400 overflow-hidden cursor-pointer
                                   transition-all duration-300 hover:border-pink-500 hover:shadow-xl hover:scale-105"
                            onclick="document.getElementById('gambar_kegiatan').click()">

                            <div id="placeholder" class="flex flex-col items-center text-gray-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-14 w-14 opacity-70" viewBox="0 0 24 24"
                                    fill="currentColor">
                                    <path
                                        d="M12 5c-3.859 0-7 3.14-7 7s3.141 7 7 7 7-3.14 7-7-3.141-7-7-7Zm0 14c-3.795 0-7-3.205-7-7s3.205-7 7-7 7 3.205 7 7-3.205 7-7 7Z" />
                                </svg>
                                <span class="font-semibold text-gray-600 mt-2">Tambah Foto</span>
                                <span class="text-gray-400 text-xs">(Klik untuk memilih)</span>
                            </div>

                        </div>

                        <!-- Input File Hidden -->
                        <input type="file" id="gambar_kegiatan" name="gambar_kegiatan" class="hidden"
                            accept="image/*" onchange="previewImage(event)">
                    </div>

                    {{-- FORM INPUT --}}
                    <div class="space-y-5">
                        <div>
                            <label class="block text-gray-700 font-semibold mb-1">Judul Kegiatan</label>
                            <input type="text" name="nama_kegiatan"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-pink-400 focus:border-pink-400"
                                required>
                        </div>

                        <div>
                            <label class="block text-gray-700 font-semibold mb-1">Tanggal</label>
                            <input type="date" name="tanggal_kegiatan"
                                class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-pink-400 focus:border-pink-400"
                                required>
                        </div>
                    </div>

                </div>

                {{-- DESKRIPSI --}}
                <div>
                    <label class="block text-gray-800 font-semibold mb-2">Deskripsi</label>
                    <textarea name="deskripsi" rows="5"
                        class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-pink-400 focus:border-pink-400"></textarea>
                </div>

                {{-- BUTTON --}}
                <div class="flex justify-end gap-4">
                    <a href="{{ route('kegiatan.index') }}"
                        class="bg-gray-300 hover:bg-gray-400 text-black px-6 py-3 rounded-lg font-semibold transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-[#560029] hover:bg-[#3f0020] text-white px-6 py-3 rounded-lg font-semibold shadow-md transition-all duration-300">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>

    {{-- Script Preview Foto --}}
    <script>
        function previewImage(event) {
            const container = document.getElementById('preview-container');
            const placeholder = document.getElementById('placeholder');
            placeholder.style.display = "none";
            container.innerHTML = `<img src="${URL.createObjectURL(event.target.files[0])}"
                                  class="w-full h-full object-cover rounded-xl" />`;
        }
    </script>

</x-app-layout>
