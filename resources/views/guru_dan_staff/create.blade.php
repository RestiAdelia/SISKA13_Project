{{-- filepath: d:\KULIAH\Semester 5\Project Utama\SISKA13_Project\resources\views\guru_dan_staff\create.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                {{ __('Tambah Data Guru dan Staff') }}
            </h2>
            <a href="{{ route('guru_dan_staff.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-5xl mx-auto bg-white shadow-md rounded-lg p-8">
            <h3 class="text-xl font-semibold text-gray-800 mb-6 border-b pb-3">
                Formulir Tambah Guru / Staff
            </h3>

            <form action="{{ route('guru_dan_staff.store') }}" method="POST" enctype="multipart/form-data"
                class="space-y-6">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- No Urut
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Urut</label>
                        <input type="number" name="no_urut" value="{{ old('no_urut') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div> --}}

                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" required
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- NIP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NIP</label>
                        <input type="number" name="nip" value="{{ old('nip') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Tempat Lahir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Tanggal Lahir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                            <option value="">-- Pilih --</option>
                            <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>Laki-laki
                            </option>
                            <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>Perempuan
                            </option>
                        </select>
                    </div>

                    {{-- No Karpeg --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">No Karpeg</label>
                        <input type="text" name="no_karpeg" value="{{ old('no_karpeg') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- NUPTK --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NUPTK</label>
                        <input type="text" name="nuptk" value="{{ old('nuptk') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- NPWP --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">NPWP</label>
                        <input type="text" name="npwp" value="{{ old('npwp') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Pangkat/Golongan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pangkat/Golongan</label>
                        <input type="text" name="pangkat_golongan" value="{{ old('pangkat_golongan') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- SK Nomor --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">SK Nomor</label>
                        <input type="text" name="sk_nomor" value="{{ old('sk_nomor') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- SK Tanggal --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">SK Tanggal</label>
                        <input type="date" name="sk_tanggal" value="{{ old('sk_tanggal') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- SK TMT --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">SK TMT</label>
                        <input type="date" name="sk_tmt" value="{{ old('sk_tmt') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Angka Kredit --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Angka Kredit</label>
                        <input type="number" step="0.001" name="angka_kredit" value="{{ old('angka_kredit') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Masa Kerja Tahun --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Masa Kerja (Tahun)</label>
                        <input type="number" name="masa_kerja_tahun" value="{{ old('masa_kerja_tahun') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Masa Kerja Bulan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Masa Kerja (Bulan)</label>
                        <input type="number" name="masa_kerja_bulan" value="{{ old('masa_kerja_bulan') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Jabatan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Jabatan</label>
                        <input type="text" name="jabatan" value="{{ old('jabatan') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Pendidikan Terakhir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Pendidikan Terakhir</label>
                        <input type="text" name="pendidikan_terakhir" value="{{ old('pendidikan_terakhir') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- TMT KGB Terakhir --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">TMT KGB Terakhir</label>
                        <input type="date" name="tmt_kgb_terakhir" value="{{ old('tmt_kgb_terakhir') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Sertifikasi --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Sertifikasi</label>
                        <select name="sertifikasi" class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                            <option value="">-- Pilih --</option>
                            <option value="Sudah" {{ old('sertifikasi') == 'Sudah' ? 'selected' : '' }}>Sudah
                            </option>
                            <option value="Belum" {{ old('sertifikasi') == 'Belum' ? 'selected' : '' }}>Belum
                            </option>
                        </select>
                    </div>

                    {{-- Keterangan --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Keterangan</label>
                        <input type="text" name="ket" value="{{ old('ket') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- TMT Bertugas --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">TMT Bertugas</label>
                        <input type="date" name="tmt_bertugas" value="{{ old('tmt_bertugas') }}"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>

                    {{-- Alamat --}}
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">{{ old('alamat') }}</textarea>
                    </div>

                    {{-- Foto --}}
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Foto</label>
                        <input type="file" name="foto" accept="image/*"
                            class="w-full border-gray-300 rounded-lg shadow-sm px-3 py-2">
                    </div>
                </div>

                {{-- Tombol Aksi --}}
                <div class="pt-6 border-t flex justify-end gap-3">
                    <a href="{{ route('guru_dan_staff.index') }}"
                        class="px-5 py-2 bg-gray-400 text-white rounded-lg hover:bg-gray-500 transition">Batal</a>
                    <button type="submit"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
