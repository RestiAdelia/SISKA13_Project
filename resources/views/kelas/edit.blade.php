<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Edit Data Kelas') }}
        </h2>
    </x-slot>

    <div class="py-8 px-6 max-w-3xl mx-auto">
        <div class="bg-white p-6 rounded-lg shadow-md border">
            <form action="{{ route('kelas.update', $kelas->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama Kelas --}}
                <div class="mb-4">
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

                {{-- Pilih Guru Pengampu --}}
                <div class="mb-6">
                    <label for="guru_id" class="block font-semibold mb-1">Guru Pengampu</label>
                    <select 
                        name="guru_id" 
                        id="guru_id"
                        class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none"
                    >
                        <option value="">-- Pilih Guru --</option>
                        @foreach ($guru as $g)
                            <option value="{{ $g->id }}" {{ $kelas->guru_id == $g->id ? 'selected' : '' }}>
                                {{ $g->nama }}
                            </option>
                        @endforeach
                    </select>
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
</x-app-layout>
