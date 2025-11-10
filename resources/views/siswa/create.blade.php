<x-app-layout>
    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-gray-800 leading-tight tracking-wide">
            <i class="fas fa-user-plus mr-3 text-indigo-600"></i>
            Tambah Data Siswa
        </h2>
    </x-slot>
    <div class="py-10 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <form action="{{ route('siswa.store') }}" method="POST">
                @csrf
                <h3 class="text-xl font-bold mb-6 text-gray-700 border-b pb-2">Informasi Utama Siswa</h3>
                {{-- Nama Siswa  --}}
                <div class="mb-5">
                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" value="{{ old('nama_siswa') }}"
                        class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                              focus:border-black focus:ring-black transition duration-300 
                               @error('nama_siswa') border-red-500 ring-red-500 @enderror"
                        required placeholder="Masukkan nama lengkap siswa">
                    @error('nama_siswa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NIPD & NISN (Grouped Inputs) --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="nipd" class="block text-sm font-medium text-gray-700 mb-2">NIPD</label>
                        <input type="number" name="nipd" id="nipd" value="{{ old('nipd') }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                  focus:border-black focus:ring-black transition duration-300
                                   @error('nipd') border-red-500 ring-red-500 @enderror"
                            required placeholder="Nomor Induk Peserta Didik">
                        @error('nipd')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                        <input type="number" name="nisn" id="nisn" value="{{ old('nisn') }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                  focus:border-black focus:ring-black transition duration-300
                                   @error('nisn') border-red-500 ring-red-500 @enderror"
                            required placeholder="Nomor Induk Siswa Nasional">
                        @error('nisn')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <h3 class="text-xl font-bold mb-6 mt-8 text-gray-700 border-b pb-2">Informasi Pribadi</h3>

                {{-- Jenis Kelamin --}}
                <div class="mb-5">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis
                        Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="w-full border-gray-300 rounded-xl px-4 py-2.5 appearance-none 
                              focus:border-black focus:ring-black transition duration-300
                               @error('jenis_kelamin') border-red-500 ring-red-500 @enderror"
                        required>
                        <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                        <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tempat & Tanggal Lahir --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat
                            Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                  focus:border-black focus:ring-black transition duration-300
                                   @error('tempat_lahir') border-red-500 ring-red-500 @enderror"
                            required placeholder="Contoh: Jakarta">
                        @error('tempat_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal
                            Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                  focus:border-black focus:ring-black transition duration-300
                                   @error('tanggal_lahir') border-red-500 ring-red-500 @enderror"
                            required>
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <h3 class="text-xl font-bold mb-6 mt-8 text-gray-700 border-b pb-2">Informasi Akademik</h3>

                {{-- Kelas dan Tahun Ajar --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    {{-- Kelas --}}
                    <div>
                        <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                        <select name="kelas_id" id="kelas_id"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 appearance-none
                                  focus:border-black focus:ring-black transition duration-300 @error('kelas_id') border-red-500 ring-red-500 @enderror"
                            required>
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id') == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Tahun Ajar --}}
                    <div>
                        <label for="tahun_ajar" class="block text-sm font-medium text-gray-700 mb-2">Tahun Ajaran</label>
                        <select name="tahun_ajar" id="tahun_ajar"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 appearance-none
                                  focus:border-black focus:ring-black transition duration-300 @error('tahun_ajar') border-red-500 ring-red-500 @enderror"
                            required>
                            <option value="" disabled selected>-- Pilih Tahun Ajaran --</option>
                            @foreach ($tahunAjarList as $ta)
                                <option value="{{ $ta }}" {{ old('tahun_ajar') == $ta ? 'selected' : '' }}>
                                    {{ $ta }}
                                </option>
                            @endforeach
                        </select>
                        @error('tahun_ajar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <h3 class="text-xl font-bold mb-6 mt-8 text-gray-700 border-b pb-2">Informasi Kontak & Alamat</h3>

                {{-- Orang Tua --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="orangtua_laki_laki" class="block text-sm font-medium text-gray-700 mb-2">Nama
                            Ayah</label>
                        <input type="text" name="orangtua_laki_laki" id="orangtua_laki_laki"
                            value="{{ old('orangtua_laki_laki') }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                  focus:border-black focus:ring-black transition duration-300"
                            placeholder="Nama Ayah Kandung/Wali">
                    </div>
                    <div>
                        <label for="orangtua_perempuan" class="block text-sm font-medium text-gray-700 mb-2">Nama
                            Ibu</label>
                        <input type="text" name="orangtua_perempuan" id="orangtua_perempuan"
                            value="{{ old('orangtua_perempuan') }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                  focus:border-black focus:ring-black transition duration-300"
                            placeholder="Nama Ibu Kandung/Wali">
                    </div>
                </div>

                {{-- Alamat --}}
                <div class="mb-5">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" rows="4"
                        class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                              focus:border-black focus:ring-black transition duration-300">{{ old('alamat') }}</textarea>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-4 mt-8 pt-4 border-t border-gray-100">
                    <a href="{{ route('siswa.index') }}"
                        class="px-6 py-2 border border-gray-300 text-gray-700 rounded-xl 
                               hover:bg-gray-50 transition duration-300 flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Kembali
                    </a>
                    <button type="submit"
                        class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-lg font-semibold shadow-md
                         transition duration-300 transform hover:scale-105">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
