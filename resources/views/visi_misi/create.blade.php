<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Visi Misi') }}
        </h2>
    </x-slot>

    <div class="py-10 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-8">

                {{-- Menampilkan error validasi Laravel --}}
                @if ($errors->any())
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
                        <strong class="font-bold">Gagal Menyimpan!</strong>
                        <span class="block sm:inline">Terdapat kesalahan input:</span>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('visi-misi.store') }}" method="POST">
                    @csrf

                    <div class="mb-5">
                        <label for="nama_sekolah" class="block text-sm font-semibold text-gray-700 mb-1">Nama
                            Sekolah</label>
                        <input type="text" id="nama_sekolah" name="nama_sekolah" value="{{ old('nama_sekolah') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3"
                            required>
                        @error('nama_sekolah')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-5">
                        <label for="akreditasi"
                            class="block text-sm font-semibold text-gray-700 mb-1">Akreditasi</label>
                        <input type="text" id="akreditasi" name="akreditasi" value="{{ old('akreditasi') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3"
                            required>
                        @error('akreditasi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="visi" class="block text-sm font-semibold text-gray-700 mb-1">Visi</label>
                        <textarea id="visi" name="visi" rows="3"
                            class="w-full border-gray-300 rounded-lg shadow-sm focus:border-blue-500 focus:ring-blue-500 p-3" required>{{ old('visi') }}</textarea>
                        @error('visi')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6 border-t pt-4">
                        <label class="block text-lg font-bold text-gray-800 mb-3">Daftar Misi</label>
                        <p class="text-sm text-gray-500 mb-4">Input setiap poin misi pada baris terpisah (minimal 1
                            misi).</p>

                        <div id="misi-container" class="space-y-3">
                            @php
                                // Ambil dari old('misi_item') jika ada error validasi
                                $misiList = old('misi_item') ?? [''];
                                $misiListFiltered = array_filter($misiList, 'trim');

                                if (empty($misiListFiltered)) {
                                    $misiListFiltered[] = '';
                                }
                            @endphp

                            @foreach ($misiListFiltered as $misiItem)
                                <div
                                    class="misi-item flex gap-2 items-center bg-white shadow-sm p-3 rounded-lg border border-gray-200">
                                    <input type="text" name="misi_item[]" value="{{ trim($misiItem) }}"
                                        placeholder="Tuliskan poin misi ke-{{ $loop->iteration }}"
                                        class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500 p-2"
                                        required>
                                    <button type="button" class="remove-misi-btn text-red-500 hover:text-red-700 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            @endforeach
                        </div>

                        <button type="button" id="add-misi-btn"
                            class="mt-4 inline-flex items-center gap-2 px-4 py-2 bg-blue-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 transition ease-in-out duration-150 shadow-md">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v16m8-8H4" />
                            </svg>
                            Tambah Poin Misi
                        </button>

                        {{-- INPUT HIDDEN YANG AKAN DIISI OLEH JS --}}
                        <input type="hidden" name="misi" id="final-misi-input" value="">
                        @error('misi')
                            <p class="text-red-500 text-sm mt-2">Error Misi: {{ $message }}</p>
                        @enderror
                    </div>

                    <hr class="my-6 border-gray-200">

                    <div class="flex justify-end gap-3 mt-8">
                        {{-- Tombol Simpan (Green Primary) --}}
                        <button type="submit" id="submit-form-btn"
                            class="inline-flex items-center px-6 py-3 border border-transparent rounded-lg font-semibold text-sm uppercase tracking-widest hover:bg-green-700 active:bg-green-800 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md"
                            style="background-color: #10B981 !important; color: white !important;">
                            SIMPAN VISI MISI
                        </button>

                        {{-- Tombol Batal (White Secondary) --}}
                        <a href="{{ route('visi-misi.index') }}"
                            class="inline-flex items-center px-6 py-3 bg-white border border-gray-300 rounded-lg font-semibold text-sm text-gray-700 uppercase tracking-widest hover:bg-gray-100 active:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-md">
                            BATAL
                        </a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    {{-- SCRIPT JAVASCRIPT --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const misiContainer = document.getElementById('misi-container');
            const addMisiBtn = document.getElementById('add-misi-btn');
            const form = document.querySelector('form');
            const finalMisiInput = document.getElementById('final-misi-input');

            // Fungsi untuk membuat input misi baru
            const createMisiItem = (value = '') => {
                const misiItems = misiContainer.querySelectorAll('.misi-item');
                // Hitung jumlah item di container untuk penomoran placeholder
                const nextCount = misiItems.length + 1;

                const div = document.createElement('div');
                div.classList.add('misi-item', 'flex', 'gap-2', 'items-center', 'bg-white', 'shadow-sm', 'p-3',
                    'rounded-lg', 'border', 'border-gray-200');
                div.innerHTML = `
                    <input type="text" name="misi_item[]" value="${value}"
                        placeholder="Tuliskan poin misi ke-${nextCount}"
                        class="w-full border-gray-300 rounded-lg focus:border-green-500 focus:ring-green-500 p-2" required>
                    <button type="button" class="remove-misi-btn text-red-500 hover:text-red-700 p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                `;
                return div;
            };

            // Logika Tambah Misi
            addMisiBtn.addEventListener('click', function() {
                const newItem = createMisiItem();
                misiContainer.appendChild(newItem);
                updateMisiPlaceholders();
            });

            // Logika Hapus Misi (delegasi event)
            misiContainer.addEventListener('click', function(e) {
                if (e.target.closest('.remove-misi-btn')) {
                    const itemToRemove = e.target.closest('.misi-item');
                    // Pastikan minimal 1 input tersisa
                    if (misiContainer.children.length > 1) {
                        itemToRemove.remove();
                        updateMisiPlaceholders();
                    } else {
                        // Jika hanya satu item tersisa, kosongkan nilainya
                        itemToRemove.querySelector('input[name="misi_item[]"]').value = '';
                    }
                    updateFinalMisiInput(); // Update hidden input
                }
            });

            // Fungsi untuk memperbarui penomoran placeholder
            const updateMisiPlaceholders = () => {
                const misiItems = misiContainer.querySelectorAll('.misi-item input[name="misi_item[]"]');
                misiItems.forEach((input, index) => {
                    input.placeholder = `Tuliskan poin misi ke-${index + 1}`;
                });
            };

            updateMisiPlaceholders();

            // Fungsi Mengambil, Menggabungkan, dan Mengisi input hidden
            const updateFinalMisiInput = () => {
                const misiItems = misiContainer.querySelectorAll('input[name="misi_item[]"]');
                const misiValues = [];

                misiItems.forEach(input => {
                    const value = input.value.trim();
                    if (value) { // Hanya ambil yang tidak kosong
                        misiValues.push(value);
                    }
                });

                // Gabungkan semua nilai misi dengan baris baru (\n)
                finalMisiInput.value = misiValues.join('\n');
            };

            // Tambahkan event listener untuk setiap perubahan di input misi (untuk update real-time)
            misiContainer.addEventListener('input', updateFinalMisiInput);

            // Logika Gabungkan Misi saat Form disubmit
            form.addEventListener('submit', function(e) {
                // Panggil fungsi pengisian nilai di saat-saat terakhir sebelum submit
                updateFinalMisiInput();
            });

            // Panggil sekali saat DOM siap untuk mengisi input hidden, penting untuk kasus old data
            updateFinalMisiInput();

        });
    </script>
</x-app-layout>
