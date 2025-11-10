<x-app-layout>
    {{-- Menggunakan warna aksen dari form sebelumnya: #560029 (Deep Maroon/Violet) --}}

    <x-slot name="header">
        <h2 class="font-extrabold text-4xl text-gray-800 leading-tight tracking-wide">
            <i class="fas fa-user-edit mr-3 text-[#560029]"></i>
            Edit Data Siswa: <span class="text-gray-600">{{ $siswa->nama_siswa }}</span>
        </h2>
    </x-slot>

    <div class="py-10 px-4 sm:px-6 lg:px-8 max-w-4xl mx-auto">
        <div class="bg-white p-8 rounded-2xl shadow-xl border border-gray-100">
            <form action="{{ route('siswa.update', $siswa->id) }}" method="POST">
                {{-- Method Spoofing untuk UPDATE --}}
                @csrf
                @method('PUT') 

                {{-- Informasi Utama --}}
                <h3 class="text-xl font-bold mb-6 text-gray-700 border-b pb-2">Informasi Utama Siswa</h3>
                <div class="mb-5">
                    <label for="nama_siswa" class="block text-sm font-medium text-gray-700 mb-2">Nama Siswa</label>
                    <input type="text" name="nama_siswa" id="nama_siswa" 
                        value="{{ old('nama_siswa', $siswa->nama_siswa) }}"
                        class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                               focus:border-[#560029] focus:ring-[#560029] transition duration-300 
                               @error('nama_siswa') border-red-500 ring-red-500 @enderror"
                        required placeholder="Masukkan nama lengkap siswa">
                    @error('nama_siswa')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- NIPD & NISN --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="nipd" class="block text-sm font-medium text-gray-700 mb-2">NIPD</label>
                        <input type="number" name="nipd" id="nipd" 
                            value="{{ old('nipd', $siswa->nipd) }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300
                                   @error('nipd') border-red-500 ring-red-500 @enderror"
                            required placeholder="Nomor Induk Peserta Didik">
                        @error('nipd')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="nisn" class="block text-sm font-medium text-gray-700 mb-2">NISN</label>
                        <input type="number" name="nisn" id="nisn" 
                            value="{{ old('nisn', $siswa->nisn) }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300
                                   @error('nisn') border-red-500 ring-red-500 @enderror"
                            required placeholder="Nomor Induk Siswa Nasional">
                        @error('nisn')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Informasi Pribadi --}}
                <h3 class="text-xl font-bold mb-6 mt-8 text-gray-700 border-b pb-2">Informasi Pribadi</h3>
                <div class="mb-5">
                    <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin"
                        class="w-full border-gray-300 rounded-xl px-4 py-2.5 appearance-none
                               focus:border-[#560029] focus:ring-[#560029] transition duration-300
                               @error('jenis_kelamin') border-red-500 ring-red-500 @enderror"
                        required>
                        <option value="" disabled>-- Pilih Jenis Kelamin --</option>
                        {{-- Menggunakan $siswa->jenis_kelamin untuk memilih opsi yang tersimpan --}}
                        <option value="L" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ old('jenis_kelamin', $siswa->jenis_kelamin) == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                    @error('jenis_kelamin')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Tempat & Tanggal Lahir --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir" 
                            value="{{ old('tempat_lahir', $siswa->tempat_lahir) }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300
                                   @error('tempat_lahir') border-red-500 ring-red-500 @enderror"
                            required placeholder="Contoh: Jakarta">
                        @error('tempat_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" 
                            value="{{ old('tanggal_lahir', $siswa->tanggal_lahir) }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300
                                   @error('tanggal_lahir') border-red-500 ring-red-500 @enderror"
                            required>
                        @error('tanggal_lahir')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Informasi Akademik --}}
                <h3 class="text-xl font-bold mb-6 mt-8 text-gray-700 border-b pb-2">Informasi Akademik</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="kelas_id" class="block text-sm font-medium text-gray-700 mb-2">Kelas</label>
                        <select name="kelas_id" id="kelas_id"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 appearance-none
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300
                                   @error('kelas_id') border-red-500 ring-red-500 @enderror" required>
                            <option value="" disabled>-- Pilih Kelas --</option>
                            @foreach ($kelas as $k)
                                <option value="{{ $k->id }}" {{ old('kelas_id', $siswa->kelas_id) == $k->id ? 'selected' : '' }}>
                                    {{ $k->nama_kelas }}
                                </option>
                            @endforeach
                        </select>
                        @error('kelas_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="tahun_ajar" class="block text-sm font-medium text-gray-700 mb-2">Tahun Ajaran</label>
                        <select name="tahun_ajar" id="tahun_ajar"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 appearance-none
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300
                                   @error('tahun_ajar') border-red-500 ring-red-500 @enderror" required>
                            <option value="" disabled>-- Pilih Tahun Ajaran --</option>
                            @foreach ($tahunAjarList as $ta)
                                <option value="{{ $ta }}" {{ old('tahun_ajar', $siswa->tahun_ajar) == $ta ? 'selected' : '' }}>
                                    {{ $ta }}
                                </option>
                            @endforeach
                        </select>
                        @error('tahun_ajar')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Informasi Kontak & Alamat --}}
                <h3 class="text-xl font-bold mb-6 mt-8 text-gray-700 border-b pb-2">Informasi Kontak & Alamat</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                    <div>
                        <label for="orangtua_laki_laki" class="block text-sm font-medium text-gray-700 mb-2">Nama Ayah (Opsional)</label>
                        <input type="text" name="orangtua_laki_laki" id="orangtua_laki_laki"
                            value="{{ old('orangtua_laki_laki', $siswa->orangtua_laki_laki) }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300"
                            placeholder="Nama Ayah Kandung/Wali">
                    </div>
                    <div>
                        <label for="orangtua_perempuan" class="block text-sm font-medium text-gray-700 mb-2">Nama Ibu (Opsional)</label>
                        <input type="text" name="orangtua_perempuan" id="orangtua_perempuan"
                            value="{{ old('orangtua_perempuan', $siswa->orangtua_perempuan) }}"
                            class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                                   focus:border-[#560029] focus:ring-[#560029] transition duration-300"
                            placeholder="Nama Ibu Kandung/Wali">
                    </div>
                </div>

                <div class="mb-5">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" rows="4"
                        class="w-full border-gray-300 rounded-xl px-4 py-2.5 
                               focus:border-[#560029] focus:ring-[#560029] transition duration-300"
                    >{{ old('alamat', $siswa->alamat) }}</textarea>
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
                        class="bg-[#560029] hover:bg-[#3f0020] text-white px-5 py-3 rounded-xl font-semibold shadow-lg shadow-[#560029]/30
                               transition duration-300 transform hover:scale-105 flex items-center">
                        <i class="fas fa-sync-alt mr-2"></i>
                        Update Data
                    </button>
                </div>

            </form>
        </div>
    </div>
</x-app-layout>