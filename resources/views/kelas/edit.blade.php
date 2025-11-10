<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Edit Data Kelas') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-md border"
             x-data="{
                tahunAjar: '{{ old('tahun_ajar', $kelas->tahun_ajar ?? '') }}',
                generateTahunAjar() {
                    const now = new Date();
                    const tahunSekarang = now.getFullYear();
                    const tahunDepan = tahunSekarang + 1;
                    this.tahunAjar = `${tahunSekarang}/${tahunDepan}`;
                }
             }"
             x-init="if(!tahunAjar) generateTahunAjar()">

            {{-- Notifikasi Error --}}
            @if ($errors->any())
                <div class="bg-red-100 text-red-800 border border-red-300 px-4 py-2 rounded mb-4">
                    <ul class="list-disc ml-5 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST" class="space-y-5">
                @csrf
                @method('PUT')

                {{-- Nama Kelas --}}
                <div>
                    <label for="nama_kelas" class="block font-semibold mb-1">Nama Kelas</label>
                    <input 
                        type="text" 
                        id="nama_kelas" 
                        name="nama_kelas" 
                        value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Masukkan nama kelas..." 
                        required
                    >
                </div>

                {{-- Guru Pengampu --}}
                <div>
                    <label for="guru_id" class="block font-semibold mb-1">Guru Pengampu</label>
                    <select 
                        name="guru_id" 
                        id="guru_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" 
                                {{ old('guru_id', $kelas->guru_id) == $g->id ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Tahun Ajar --}}
                <div>
                    <label for="tahun_ajar" class="block font-semibold mb-1">Tahun Ajar</label>
                    <input 
                        type="text" 
                        id="tahun_ajar" 
                        name="tahun_ajar" 
                        x-model="tahunAjar"
                        value="{{ old('tahun_ajar', $kelas->tahun_ajar) }}"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        placeholder="Contoh: 2024/2025" 
                        required
                    >
                    <p class="text-gray-500 text-sm mt-1">*Otomatis diisi berdasarkan tahun sekarang, bisa diubah jika perlu.</p>
                </div>

                {{-- Tombol Aksi --}}
                <div class="flex justify-end gap-3">
                    <a href="{{ route('kelas.index') }}" 
                       class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Kembali
                    </a>
                    <button type="submit" 
                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Update
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Script AlpineJS --}}
    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
