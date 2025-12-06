<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <h2 class="font-bold text-2xl md:text-3xl text-gray-800 leading-tight">
                {{ __('Edit Tugas') }}
            </h2>
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3 text-sm text-gray-500">
                    <li><a href="#" class="hover:text-[#560029] transition-colors">Dashboard</a></li>
                    <li>/</li>
                    <li><a href="{{ route('tugas.index') }}" class="hover:text-[#560029] transition-colors">Tugas</a></li>
                    <li>/</li>
                    <li class="font-medium text-gray-900">Edit</li>
                </ol>
            </nav>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                
                {{-- Header Form --}}
                <div class="bg-gray-50/50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-medium text-gray-900">Formulir Perubahan Tugas</h3>
                        <p class="text-sm text-gray-500">Silakan perbarui detail tugas di bawah ini.</p>
                    </div>
                    <span class="px-3 py-1 rounded-full bg-amber-100 text-amber-700 text-xs font-bold border border-amber-200 flex items-center gap-1">
                        <i class="fa-solid fa-pen"></i> Edit Mode
                    </span>
                </div>

                <div class="p-6 md:p-8">
                    <form action="{{ route('tugas.update', $tugas->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PUT')

                        {{-- Judul --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Judul Tugas <span class="text-red-500">*</span></label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-heading"></i>
                                </span>
                                <input type="text" name="judul" value="{{ old('judul', $tugas->judul) }}"
                                    class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5" 
                                    required placeholder="Contoh: Latihan Matematika Bab 1">
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Kelas --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Target Kelas <span class="text-red-500">*</span></label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                        <i class="fa-solid fa-chalkboard-user"></i>
                                    </span>
                                    <select name="kelas_id" id="kelas_id"
                                        class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5 cursor-pointer bg-white" required>
                                        <option value="">-- Pilih Kelas --</option>
                                        @foreach ($kelas as $k)
                                            <option value="{{ $k->id }}"
                                                data-mapel="{{ is_array($k->mata_pelajaran) ? implode(', ', $k->mata_pelajaran) : $k->mata_pelajaran }}"
                                                {{ old('kelas_id', $tugas->kelas_id) == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Mata Pelajaran (Readonly) --}}
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Mata Pelajaran (Otomatis)</label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                        <i class="fa-solid fa-book"></i>
                                    </span>
                                    <input type="text" id="mata_pelajaran" name="mata_pelajaran"
                                        value="{{ old('mata_pelajaran', $tugas->mata_pelajaran) }}"
                                        class="pl-10 w-full rounded-lg border-gray-300 bg-gray-100 text-gray-500 cursor-not-allowed shadow-sm py-2.5" 
                                        readonly placeholder="Pilih kelas terlebih dahulu">
                                </div>
                            </div>
                        </div>

                        {{-- Deskripsi --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Deskripsi & Instruksi <span class="text-red-500">*</span></label>
                            <textarea name="deskripsi" rows="5" 
                                class="w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5" 
                                required placeholder="Tuliskan instruksi tugas secara detail...">{{ old('deskripsi', $tugas->deskripsi) }}</textarea>
                        </div>

                        {{-- Deadline (DATE ONLY) --}}
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tenggat Waktu (Tanggal) <span class="text-red-500">*</span></label>
                            <div class="relative max-w-sm">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fa-regular fa-calendar-days"></i>
                                </span>
                                {{-- PERUBAHAN: type="date" dan format tanggal saja (Y-m-d) --}}
                                <input type="date" name="deadline"
                                    value="{{ old('deadline', \Carbon\Carbon::parse($tugas->deadline)->format('Y-m-d')) }}"
                                    class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5 cursor-pointer" 
                                    required>
                            </div>
                            <p class="text-xs text-gray-500 mt-1">
                                <i class="fa-solid fa-info-circle text-blue-400"></i> Tugas akan berakhir pada pukul 23:59 di tanggal yang dipilih.
                            </p>
                        </div>

                        {{-- Lampiran --}}
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <label class="block text-sm font-medium text-gray-700 mb-2">File Lampiran</label>
                            
                            @if ($tugas->file_lampiran)
                                <div class="flex items-center gap-3 mb-3 bg-white p-3 border rounded-md w-fit">
                                    <div class="w-8 h-8 rounded bg-red-100 text-red-600 flex items-center justify-center">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </div>
                                    <div class="text-sm">
                                        <p class="text-gray-700 font-medium">File saat ini tersedia</p>
                                        <a href="{{ asset('storage/' . $tugas->file_lampiran) }}" target="_blank" class="text-blue-600 hover:underline text-xs flex items-center gap-1">
                                            <i class="fa-solid fa-external-link-alt"></i> Lihat / Download
                                        </a>
                                    </div>
                                </div>
                            @endif

                            <input type="file" name="file_lampiran" class="block w-full text-sm text-gray-500
                                file:mr-4 file:py-2 file:px-4
                                file:rounded-full file:border-0
                                file:text-xs file:font-semibold
                                file:bg-[#560029] file:text-white
                                hover:file:bg-[#3f0020]
                                cursor-pointer border border-gray-300 rounded-lg bg-white">
                            <p class="text-xs text-gray-400 mt-1">Biarkan kosong jika tidak ingin mengubah file lampiran.</p>
                        </div>

                        {{-- Footer Actions --}}
                        <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                            <a href="{{ route('tugas.index') }}"
                                class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition font-medium shadow-sm">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2.5 bg-[#560029] text-white rounded-lg hover:bg-[#3f0020] transition shadow-md hover:shadow-lg font-medium flex items-center">
                                <i class="fa-regular fa-floppy-disk mr-2"></i> Update Tugas
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script: Auto isi mapel berdasarkan kelas --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const kelasSelect = document.getElementById('kelas_id');
            const mapelInput = document.getElementById('mata_pelajaran');

            kelasSelect.addEventListener('change', function() {
                // Ambil data-mapel dari option yang dipilih
                let mapel = this.options[this.selectedIndex].getAttribute('data-mapel');
                mapelInput.value = mapel || "";
            });
        });
    </script>

</x-app-layout>