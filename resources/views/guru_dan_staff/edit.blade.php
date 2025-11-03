<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Edit Data Guru dan Staff') }}
        </h2>
    </x-slot>

    <div class="container mx-auto px-4 py-8">
        <h2 class="text-2xl font-bold mb-6">Edit Guru / Staf</h2>

        <form action="{{ route('guru_dan_staff.update', $item->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white p-6 rounded shadow-md space-y-4">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">

                {{-- NIP --}}
                <div>
                    <label class="block text-gray-700">NIP</label>
                    <input type="text" name="nip" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->nip }}">
                </div>

                {{-- Nama --}}
                <div>
                    <label class="block text-gray-700">Nama</label>
                    <input type="text" name="nama" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->nama }}" required>
                </div>

                {{-- Tempat Lahir --}}
                <div>
                    <label class="block text-gray-700">Tempat Lahir</label>
                    <input type="text" name="tempat_lahir" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->tempat_lahir }}">
                </div>

                {{-- Tanggal Lahir --}}
                <div>
                    <label class="block text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->tanggal_lahir ? \Carbon\Carbon::parse($item->tanggal_lahir)->format('Y-m-d') : '' }}">
                </div>

                {{-- Jenis Kelamin --}}
                <div>
                    <label class="block text-gray-700">Jenis Kelamin</label>
                    <select name="jenis_kelamin" class="w-full border border-gray-300 rounded px-3 py-2">
                        <option value="">-- Pilih --</option>
                        <option value="L" {{ $item->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $item->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                {{-- Karpeg --}}
                <div>
                    <label class="block text-gray-700">Karpeg</label>
                    <input type="text" name="karpeg" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->karpeg }}">
                </div>

                {{-- NUPTK --}}
                <div>
                    <label class="block text-gray-700">NUPTK</label>
                    <input type="text" name="nuptk" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->nuptk }}">
                </div>

                {{-- NPWP --}}
                <div>
                    <label class="block text-gray-700">NPWP</label>
                    <input type="text" name="npwp" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->npwp }}">
                </div>

                {{-- Pangkat / Golongan --}}
                <div>
                    <label class="block text-gray-700">Pangkat/Golongan</label>
                    <input type="text" name="pangkat_golongan"
                        class="w-full border border-gray-300 rounded px-3 py-2" value="{{ $item->pangkat_golongan }}">
                </div>

                {{-- SK Pangkat Terakhir --}}
                <div>
                    <label class="block text-gray-700">SK Pangkat Terakhir</label>
                    <input type="text" name="sk_pangkat_terakhir"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->sk_pangkat_terakhir }}">
                </div>

                {{-- Jabatan --}}
                <div>
                    <label class="block text-gray-700">Jabatan</label>
                    <input type="text" name="jabatan" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->jabatan }}">
                </div>

                {{-- Pendidikan Terakhir --}}
                <div>
                    <label class="block text-gray-700">Pendidikan Terakhir</label>
                    <input type="text" name="pendidikan_terakhir"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->pendidikan_terakhir }}">
                </div>

                {{-- TMT KGB Terakhir --}}
                <div>
                    <label class="block text-gray-700">TMT KGB Terakhir</label>
                    <input type="date" name="tmt_kgb_terakhir"
                        class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->tmt_kgb_terakhir ? \Carbon\Carbon::parse($item->tmt_kgb_terakhir)->format('Y-m-d') : '' }}">
                </div>

                {{-- Sertifikasi --}}
                <div>
                    <label class="block text-gray-700">Sertifikasi</label>
                    <input type="text" name="sertifikasi" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->sertifikasi }}">
                </div>

                {{-- TMT Bertugas --}}
                <div>
                    <label class="block text-gray-700">TMT Bertugas</label>
                    <input type="date" name="tmt_bertugas" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->tmt_bertugas ? \Carbon\Carbon::parse($item->tmt_bertugas)->format('Y-m-d') : '' }}">
                </div>

                {{-- Alamat --}}
                <div class="col-span-2">
                    <label class="block text-gray-700">Alamat</label>
                    <textarea name="alamat" class="w-full border border-gray-300 rounded px-3 py-2" rows="3">{{ $item->alamat }}</textarea>
                </div>

                {{-- Rencana Pensiun --}}
                <div>
                    <label class="block text-gray-700">Rencana Pensiun</label>
                    <input type="date" name="rencana_pensiun" class="w-full border border-gray-300 rounded px-3 py-2"
                        value="{{ $item->rencana_pensiun ? \Carbon\Carbon::parse($item->rencana_pensiun)->format('Y-m-d') : '' }}">
                </div>

                {{-- Foto --}}
                <div>
                    <label class="block text-gray-700">Foto</label>
                    @if ($item->foto)
                        <img src="{{ asset('uploads/' . $item->foto) }}" alt="Foto"
                            class="w-20 h-20 object-cover rounded mb-2">
                    @endif
                    <input type="file" name="foto" class="w-full border border-gray-300 rounded px-3 py-2"
                        accept="image/*">
                </div>
            </div>

            <div class="mt-4">
                <button type="submit"
                    class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">Update</button>
                <a href="{{ route('guru_dan_staff.index') }}"
                    class="px-6 py-2 bg-gray-400 text-white rounded hover:bg-gray-500 transition">Batal</a>
            </div>
        </form>
    </div>
</x-app-layout>
