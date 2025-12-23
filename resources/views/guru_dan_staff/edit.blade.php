<x-app-layout>
   <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Edit Staf & Guru') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gradient-to-br from-gray-50 to-gray-100 min-h-screen">
        <div class="max-w-5xl mx-auto bg-white p-10 rounded-2xl shadow-xl border border-gray-100">

            {{-- Judul dengan Gaya yang Sama (Garis di tengah bawah) --}}
            <div class="mb-10 text-center md:text-left">
                <h2 class="relative inline-block pb-3 text-2xl font-bold text-gray-800">
                    Perbarui Profil Guru / Staf
                    <span class="absolute bottom-0 left-1/2 md:left-0 md:translate-x-0 -translate-x-1/2 w-16 h-1 bg-[#4a0000] rounded-full"></span>
                </h2>
            </div>

            <form action="{{ route('guru_dan_staff.update', $item->id) }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf
                @method('PUT')

                @php
                    // Variabel class input agar seragam: Fokus Hitam & Ring Maroon Gelap
                    $inputClass = "w-full border-gray-300 rounded-lg shadow-sm px-4 py-2 transition-all duration-300 
                                   focus:border-black focus:ring-2 focus:ring-[#4a0000] focus:ring-opacity-50 outline-none";
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    {{-- NIP --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">NIP</label>
                        <input type="text" name="nip" value="{{ $item->nip }}" class="{{ $inputClass }}">
                    </div>

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ $item->nama }}" class="{{ $inputClass }}" required>
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ $item->tempat_lahir }}" class="{{ $inputClass }}">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" 
                            value="{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('Y-m-d') : '' }}" 
                            class="{{ $inputClass }}">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="{{ $inputClass }}">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ $item->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $item->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    {{-- Karpeg --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Nomor Karpeg</label>
                        <input type="text" name="karpeg" value="{{ $item->karpeg }}" class="{{ $inputClass }}">
                    </div>

                    {{-- NUPTK --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">NUPTK</label>
                        <input type="text" name="nuptk" value="{{ $item->nuptk }}" class="{{ $inputClass }}">
                    </div>

                    {{-- NPWP --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">NPWP</label>
                        <input type="text" name="npwp" value="{{ $item->npwp }}" class="{{ $inputClass }}">
                    </div>

                    {{-- Jabatan --}}
                   <div>
    <label class="block text-sm font-bold text-gray-700 mb-1">Jabatan</label>
    <select name="jabatan" class="{{ $inputClass }}">
        <option value="">-- Pilih Jabatan --</option>
        
        <option value="Kepala Sekolah" {{ old('jabatan', $item->jabatan) == 'Kepala Sekolah' ? 'selected' : '' }}>
            Kepala Sekolah
        </option>
        
        <option value="Guru" {{ old('jabatan', $item->jabatan) == 'Guru' ? 'selected' : '' }}>
            Guru
        </option>
        
        <option value="Staf" {{ old('jabatan', $item->jabatan) == 'Staf' ? 'selected' : '' }}>
            Staf
        </option>
        
    </select>
</div>

                    {{-- Pendidikan Terakhir --}}
                    <div>
                        <label class="block text-sm font-bold text-gray-700 mb-1">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" value="{{ $item->pendidikan_terakhir }}" class="{{ $inputClass }}">
                    </div>

                    {{-- Alamat (Full Width) --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-bold text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" class="{{ $inputClass }}" rows="3">{{ $item->alamat }}</textarea>
                    </div>

                    {{-- Foto --}}
                    <div class="md:col-span-2 bg-gray-50 p-4 rounded-xl border border-gray-200">
                        <label class="block text-sm font-bold text-gray-700 mb-3">Foto Profil</label>
                        <div class="flex items-center gap-6">
                            @if ($item->foto)
                                <div class="relative">
                                    <img src="{{ asset('uploads/' . $item->foto) }}" alt="Foto"
                                        class="w-24 h-24 object-cover rounded-full border-4 border-white shadow-md">
                                    <span class="absolute -bottom-2 left-1/2 -translate-x-1/2 bg-gray-800 text-white text-[10px] px-2 py-0.5 rounded-full">Foto Saat Ini</span>
                                </div>
                            @endif
                            <div class="flex-1">
                                <input type="file" name="foto" class="{{ $inputClass }} file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-gray-200 file:text-gray-700 hover:file:bg-gray-300" accept="image/*">
                                <p class="text-xs text-gray-500 mt-2 italic">*Kosongkan jika tidak ingin mengubah foto</p>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-4 pt-8 border-t border-gray-100">
                    <a href="{{ route('guru_dan_staff.index') }}"
                        class="px-6 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-semibold">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-10 py-2 bg-[#4a0000] hover:bg-black text-white rounded-lg font-bold shadow-lg transition-all duration-300">
                        Update Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>