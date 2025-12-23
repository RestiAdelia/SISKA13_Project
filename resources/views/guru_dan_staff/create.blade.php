<x-app-layout>
    <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Data Staf & Guru') }}
            </h2>
        </div>
    </x-slot>

    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-5xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-100">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3 flex items-center">
                <span class="w-2 h-6 bg-[#800000] rounded-full mr-3"></span>
                Formulir Tambah Guru / Staf
            </h3>

            <form action="{{ route('guru_dan_staff.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                {{-- CSS Kustom untuk memperpendek penulisan jika diperlukan, 
                     tapi di bawah ini saya langsung terapkan di class Tailwind --}}
                @php
                    $inputClass = "w-full border-gray-300 rounded-lg shadow-sm px-3 py-2 transition-all duration-200 focus:border-[#800000] focus:ring focus:ring-[#800000] focus:ring-opacity-20 outline-none";
                @endphp

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    
                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                            class="{{ $inputClass }}">
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                        <input type="number" name="nip" value="{{ old('nip') }}"
                            class="{{ $inputClass }}">
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="{{ $inputClass }}">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="{{ $inputClass }}">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="{{ $inputClass }}">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>

                    {{-- No Karpeg --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Karpeg</label>
                        <input type="text" name="no_karpeg" value="{{ old('no_karpeg') }}"
                            class="{{ $inputClass }}">
                    </div>

                    {{-- Pangkat/Golongan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pangkat/Golongan</label>
                        <input type="text" name="pangkat_golongan" value="{{ old('pangkat_golongan') }}"
                            class="{{ $inputClass }}">
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <select name="jabatan" class="{{ $inputClass }}">
                            <option value="">-- Pilih Jabatan --</option>
                            <option value="Kepala Sekolah" {{ old('jabatan') == 'Kepala Sekolah' ? 'selected' : '' }}>Kepala Sekolah</option>
                            <option value="Guru" {{ old('jabatan') == 'Guru' ? 'selected' : '' }}>Guru</option>
                            <option value="Staf" {{ old('jabatan') == 'Staf' ? 'selected' : '' }}>Staf</option>
                        </select>
                    </div>

                    {{-- Sertifikasi --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sertifikasi</label>
                        <select name="sertifikasi" class="{{ $inputClass }}">
                            <option value="">-- Pilih --</option>
                            <option value="Sudah" {{ old('sertifikasi') == 'Sudah' ? 'selected' : '' }}>Sudah</option>
                            <option value="Belum" {{ old('sertifikasi') == 'Belum' ? 'selected' : '' }}>Belum</option>
                        </select>
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto Profil</label>
                        <input type="file" name="foto" accept="image/*"
                            class="{{ $inputClass }} file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:bg-gray-100 file:text-gray-700 hover:file:bg-gray-200">
                    </div>

                    {{-- Alamat --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Lengkap</label>
                        <textarea name="alamat" rows="3" 
                            class="{{ $inputClass }}">{{ old('alamat') }}</textarea>
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="pt-6 border-t flex justify-end gap-3">
                    <a href="{{ route('guru_dan_staff.index') }}"
                        class="px-5 py-2 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition font-medium">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-8 py-2 bg-[#800000] text-white rounded-lg hover:bg-[#600000] transition font-bold shadow-lg shadow-maroon/20">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>