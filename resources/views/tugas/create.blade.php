<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl md:text-3xl text-gray-800 leading-tight">
                {{ __('Buat Tugas Baru') }}
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-[#560029] transition-colors">Dashboard</a></li>
                    <li>/</li>
                    <li class="font-medium text-gray-900">Pilih Mapel</li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6 flex flex-col md:flex-row items-center gap-4">

                {{-- Deskripsi --}}
                <p class="text-gray-600 flex-1">
                    Silakan pilih <strong>Mata Pelajaran</strong> di dalam kartu
                    <strong>Kelas</strong> tujuan untuk membuat tugas.
                </p>

                {{-- Tombol Kembali --}}
                <a href="{{ route('tugas.index') }}"
                    class="flex items-center justify-center gap-2 px-4 py-2 bg-[#560029] text-white rounded-lg hover:bg-[#3f0020] transition shadow-sm">
                    <i class="fa-solid fa-arrow-left"></i>
                    <span>Cancel</span>
                </a>
            </div>


            {{-- Grid Layout untuk Kelas --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($kelas as $k)
                    <div
                        class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden hover:shadow-lg transition duration-300 flex flex-col h-full">

                        {{-- Header Kartu Kelas --}}
                        <div class="bg-[#560029] px-5 py-4 flex justify-between items-center">
                            <h3 class="text-lg font-bold text-white flex items-center gap-2">
                                <i class="fa-solid fa-chalkboard"></i> {{ $k->nama_kelas }}
                            </h3>
                            <span class="bg-white/20 text-white text-xs px-2 py-1 rounded-md">
                                {{ $k->tahun_ajar }}
                            </span>
                        </div>

                        {{-- Daftar Mata Pelajaran --}}
                        <div class="p-4 flex-1 bg-gray-50/50">
                            @php
                                $mapels = is_array($k->mata_pelajaran)
                                    ? $k->mata_pelajaran
                                    : (empty($k->mata_pelajaran)
                                        ? []
                                        : explode(',', $k->mata_pelajaran));
                            @endphp

                            @if (count($mapels) > 0)
                                <div class="space-y-2">
                                    @foreach ($mapels as $mapel)
                                        <div
                                            class="group flex items-center justify-between bg-white border border-gray-200 p-3 rounded-lg hover:border-[#560029]/30 transition-colors shadow-sm">
                                            <div class="flex items-center gap-3">
                                                <div
                                                    class="w-8 h-8 rounded-full bg-blue-50 text-blue-600 flex items-center justify-center text-xs">
                                                    <i class="fa-solid fa-book-open"></i>
                                                </div>
                                                <span
                                                    class="font-medium text-gray-700 text-sm">{{ $mapel }}</span>
                                            </div>

                                            <button
                                                onclick="openForm('{{ $k->id }}', '{{ addslashes($mapel) }}', '{{ $k->nama_kelas }}')"
                                                class="w-8 h-8 flex items-center justify-center bg-gray-100 text-gray-500 rounded-full hover:bg-[#560029] hover:text-white transition-all duration-300 transform group-hover:scale-110"
                                                title="Buat Tugas untuk {{ $mapel }}">
                                                <i class="fa-solid fa-plus"></i>
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-6 text-gray-400 text-sm">
                                    <i class="fa-solid fa-ban mb-2"></i>
                                    <p>Tidak ada mata pelajaran</p>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>

    {{-- Modal Form Tambah (Modern Style) --}}
    <div id="modal" class="fixed inset-0 z-50 hidden" aria-labelledby="modal-title" role="dialog"
        aria-modal="true">
        {{-- Backdrop --}}
        <div class="fixed inset-0 bg-gray-900/60 backdrop-blur-sm transition-opacity" onclick="closeForm()"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
            <div
                class="relative transform overflow-hidden rounded-xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-lg border border-gray-200">

                {{-- Header Modal --}}
                <div class="bg-[#560029] px-4 py-3 sm:px-6 flex justify-between items-center">
                    <h3 class="text-lg font-semibold leading-6 text-white" id="modal-title">
                        <i class="fa-solid fa-pen-to-square mr-2"></i> Form Tugas Baru
                    </h3>
                    <button type="button" onclick="closeForm()"
                        class="text-white/70 hover:text-white focus:outline-none">
                        <i class="fa-solid fa-xmark text-xl"></i>
                    </button>
                </div>

                {{-- Body Form --}}
                <form action="{{ route('tugas.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="px-4 py-5 sm:p-6 space-y-4">

                        {{-- Hidden Inputs --}}
                        <input type="hidden" id="kelas_id" name="kelas_id">
                        <input type="hidden" id="mata_pelajaran" name="mata_pelajaran">

                        {{-- Info Target (Read Only) --}}
                        <div
                            class="bg-blue-50 p-3 rounded-lg border border-blue-100 flex gap-3 text-sm text-blue-800 mb-4">
                            <i class="fa-solid fa-circle-info mt-0.5"></i>
                            <div>
                                <p>Anda akan membuat tugas untuk:</p>
                                <p class="font-bold mt-1" id="targetInfoText">Kelas - Mapel</p>
                            </div>
                        </div>

                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas <span
                                    class="text-red-500">*</span></label>
                            <input type="text" name="judul"
                                class="w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2"
                                required placeholder="Contoh: Latihan Soal Bab 1">
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi / Instruksi <span
                                    class="text-red-500">*</span></label>
                            <textarea name="deskripsi" rows="3"
                                class="w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2"
                                required placeholder="Jelaskan detail tugas..."></textarea>
                        </div>

                        {{-- Deadline --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tenggat Waktu (Deadline) <span
                                    class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fa-regular fa-clock"></i>
                                </span>
                                <input type="date" name="deadline"
                                    class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm text-sm py-2"
                                    required>
                            </div>
                        </div>

                        {{-- File Lampiran --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Lampiran File (Opsional)</label>
                            <input type="file" name="file_lampiran"
                                class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-xs file:font-semibold
                                file:bg-[#560029]/10 file:text-[#560029]
                                hover:file:bg-[#560029]/20
                                cursor-pointer border border-gray-300 rounded-lg bg-gray-50">
                        </div>
                    </div>

                    {{-- Footer Modal --}}
                    <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6 border-t border-gray-100">
                        <button type="submit"
                            class="inline-flex w-full justify-center rounded-lg bg-[#560029] px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-[#3f0020] sm:ml-3 sm:w-auto transition-all">
                            Simpan Tugas
                        </button>
                        <button type="button" onclick="closeForm()"
                            class="mt-3 inline-flex w-full justify-center rounded-lg bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50 sm:mt-0 sm:w-auto transition-all">
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Script Vanilla JS untuk Modal --}}
    <script>
        const modal = document.getElementById("modal");
        const kelasInput = document.getElementById("kelas_id");
        const mapelInput = document.getElementById("mata_pelajaran");
        const targetInfoText = document.getElementById("targetInfoText");

        // Buka modal dengan data kelas + mapel
        function openForm(kelasId, mapel, namaKelas) {
            kelasInput.value = kelasId;
            mapelInput.value = mapel;
            targetInfoText.innerText = `${namaKelas} — ${mapel}`;

            modal.classList.remove("hidden");
            modal.querySelector('.transform').classList.add('scale-100');
            modal.querySelector('.transform').classList.remove('scale-95');
        }

        // Tutup modal
        function closeForm() {
            modal.classList.add("hidden");
        }

        // Tutup modal 
        document.onkeydown = function(evt) {
            evt = evt || window.event;
            if (evt.keyCode == 27) {
                closeForm();
            }
        };
    </script>

</x-app-layout>
