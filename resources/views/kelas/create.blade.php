<x-app-layout>
  <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Tambah Kelas ') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden" 
                x-data="{
                    tahunAjar: '{{ $tahunAjar ?? '' }}',
                    generateTahunAjar() {
                        const now = new Date();
                        const tahunSekarang = now.getFullYear();
                        const tahunDepan = tahunSekarang + 1;
                        this.tahunAjar = `${tahunSekarang}/${tahunDepan}`;
                    }
                }" 
                x-init="if (!tahunAjar) generateTahunAjar()"
            >
                
                {{-- Header Form --}}
                <div class="bg-gray-50/50 px-6 py-4 border-b border-gray-100">
                    <h3 class="text-lg font-medium text-gray-900">Formulir Data Kelas</h3>
                    <p class="text-sm text-gray-500">Silakan lengkapi informasi kelas di bawah ini.</p>
                </div>

                <div class="p-6 md:p-8">
                    {{-- Notifikasi Error --}}
                    @if ($errors->any())
                        <div class="mb-6 bg-red-50 border-l-4 border-red-500 text-red-700 p-4 rounded shadow-sm" role="alert">
                            <p class="font-bold flex items-center"><i class="fa-solid fa-circle-exclamation mr-2"></i> Terdapat Kesalahan:</p>
                            <ul class="list-disc ml-6 mt-1 text-sm">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('kelas.store') }}" method="POST" class="space-y-6">
                        @csrf

                        {{-- Nama Kelas --}}
                        <div>
                            <label for="nama_kelas" class="block text-sm font-medium text-gray-700 mb-1">
                                Nama Kelas <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                    <i class="fa-solid fa-chalkboard"></i>
                                </span>
                                <input type="text" id="nama_kelas" name="nama_kelas" value="{{ old('nama_kelas') }}"
                                    class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5"
                                    placeholder="Contoh: XII IPA 1" required>
                            </div>
                        </div>

                        {{-- Grid: Guru & Tahun Ajar --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            {{-- Guru Pengampu --}}
                            <div>
                                <label for="guru_id" class="block text-sm font-medium text-gray-700 mb-1">
                                    Wali Kelas / Guru <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                        <i class="fa-solid fa-user-tie"></i>
                                    </span>
                                    <select name="guru_id" id="guru_id"
                                        class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5 bg-white cursor-pointer">
                                        <option value="">-- Pilih Guru --</option>
                                        @foreach ($guru as $g)
                                            <option value="{{ $g->id }}" {{ old('guru_id') == $g->id ? 'selected' : '' }}>
                                                {{ $g->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            {{-- Tahun Ajar --}}
                            <div>
                                <label for="tahun_ajar" class="block text-sm font-medium text-gray-700 mb-1">
                                    Tahun Ajaran <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </span>
                                    <input type="text" id="tahun_ajar" name="tahun_ajar" x-model="tahunAjar"
                                        class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5 bg-gray-50"
                                        placeholder="Contoh: 2024/2025" required>
                                </div>
                                <p class="text-xs text-gray-500 mt-1 flex items-center gap-1">
                                    <i class="fa-solid fa-circle-info text-blue-400"></i> Terisi otomatis, dapat diubah manual.
                                </p>
                            </div>
                        </div>

                        {{-- Divider --}}
                        <div class="border-t border-gray-100 my-4"></div>

                        {{-- Mata Pelajaran (Dynamic Input) --}}
                        <div x-data="{
                            mapel: [''],
                            updateJSON() {
                                $refs.mapel_json.value = JSON.stringify(this.mapel);
                            },
                            addMapel() {
                                this.mapel.push('');
                                this.updateJSON();
                            },
                            removeMapel(i) {
                                this.mapel.splice(i, 1);
                                this.updateJSON();
                            }
                        }" x-init="updateJSON()">

                            <div class="flex justify-between items-end mb-3">
                                <label class="block text-sm font-medium text-gray-700">
                                    Daftar Mata Pelajaran
                                </label>
                                <span class="text-xs text-gray-500 bg-gray-100 px-2 py-1 rounded">Opsional</span>
                            </div>

                            <div class="space-y-3">
                                <template x-for="(item, index) in mapel" :key="index">
                                    <div class="flex items-center gap-3 animate-fade-in-down">
                                        <div class="relative flex-1">
                                            <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                                                <i class="fa-solid fa-book-open"></i>
                                            </span>
                                            <input type="text"
                                                class="pl-10 w-full rounded-lg border-gray-300 focus:border-[#560029] focus:ring focus:ring-[#560029] focus:ring-opacity-20 transition shadow-sm py-2.5"
                                                placeholder="Masukkan nama mata pelajaran..." 
                                                x-model="mapel[index]" 
                                                @input="updateJSON()">
                                        </div>

                                        {{-- Tombol Hapus --}}
                                        <button type="button" 
                                            class="w-10 h-10 flex items-center justify-center rounded-lg border border-red-200 text-red-500 hover:bg-red-50 hover:text-red-700 transition"
                                            x-show="mapel.length > 1" 
                                            @click="removeMapel(index)"
                                            title="Hapus Mapel">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </button>
                                        {{-- Spacer jika tombol hapus tidak ada (agar layout konsisten) --}}
                                        <div x-show="mapel.length <= 1" class="w-10"></div> 
                                    </div>
                                </template>
                            </div>

                            {{-- Tombol Tambah Mapel --}}
                            <button type="button" 
                                class="mt-4 w-full md:w-auto flex items-center justify-center px-4 py-2 border border-dashed border-[#560029] text-[#560029] rounded-lg hover:bg-[#560029] hover:text-white transition-all duration-300 text-sm font-medium group"
                                @click="addMapel()">
                                <i class="fa-solid fa-plus mr-2 group-hover:rotate-90 transition-transform"></i> Tambah Mata Pelajaran Lain
                            </button>

                            {{-- HIDDEN INPUT JSON --}}
                            <input type="hidden" name="mata_pelajaran" x-ref="mapel_json">
                        </div>

                        {{-- Footer Actions --}}
                        <div class="pt-6 border-t border-gray-100 flex items-center justify-end gap-3">
                            <a href="{{ route('kelas.index') }}"
                                class="px-5 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 hover:text-gray-900 transition font-medium shadow-sm">
                                Batal
                            </a>
                            <button type="submit"
                                class="px-5 py-2.5 bg-[#560029] text-white rounded-lg hover:bg-[#3f0020] transition shadow-md hover:shadow-lg font-medium flex items-center">
                                <i class="fa-regular fa-floppy-disk mr-2"></i> Simpan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Style Tambahan untuk Animasi Halus --}}
    <style>
        .animate-fade-in-down {
            animation: fadeInDown 0.3s ease-out;
        }
        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>