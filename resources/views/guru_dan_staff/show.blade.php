<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-bold text-3xl text-gray-800 leading-tight">
                Detail Guru / Staf
            </h2>
            <a href="{{ route('guru_dan_staff.index') }}"
                class="px-4 py-2 bg-gray-500 text-white rounded hover:bg-gray-600 transition">
                ← Kembali
            </a>
        </div>
    </x-slot>

    <div class="bg-gray-50 min-h-screen py-10">
        <div class="max-w-5xl mx-auto bg-white shadow-lg rounded-2xl overflow-hidden">
            <div class="grid grid-cols-1 md:grid-cols-3">
                {{-- BAGIAN FOTO --}}
                <div class="p-6 bg-gray-100 flex flex-col items-center justify-center border-r border-gray-200">
                    @if ($guruDanStaff->foto)
                        <img src="{{ asset('uploads/' . $guruDanStaff->foto) }}" alt="{{ $guruDanStaff->nama }}"
                            class="rounded-xl shadow-md w-56 h-56 object-cover border border-gray-300">
                    @else
                        <div class="text-gray-500 italic">Tidak ada foto</div>
                    @endif

                    <h3 class="text-xl font-semibold text-gray-800 mt-4">
                        {{ $guruDanStaff->nama }}
                    </h3>
                    <p class="text-gray-600">{{ $guruDanStaff->jabatan ?? '-' }}</p>
                </div>

                {{-- BAGIAN DETAIL --}}
                <div class="md:col-span-2 p-8">
                    <h4 class="text-lg font-bold text-pink-800 mb-4 border-b pb-2">Informasi Pribadi</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700">
                        <div><span class="font-medium">NIP:</span> {{ $guruDanStaff->nip ?? '-' }}</div>
                        <div><span class="font-medium">Jenis Kelamin:</span>
                            {{ $guruDanStaff->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        </div>
                        <div><span class="font-medium">Tempat Lahir:</span> {{ $guruDanStaff->tempat_lahir ?? '-' }}
                        </div>
                        <div><span class="font-medium">Tanggal Lahir:</span>
                            {{ $guruDanStaff->tanggal_lahir ? \Carbon\Carbon::parse($guruDanStaff->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
                        </div>
                        <div><span class="font-medium">Alamat:</span> {{ $guruDanStaff->alamat ?? '-' }}</div>
                    </div>

                    <h4 class="text-lg font-bold text-pink-800 mt-8 mb-4 border-b pb-2">Informasi Kepegawaian</h4>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-gray-700">
                        <div><span class="font-medium">No Karpeg:</span> {{ $guruDanStaff->no_karpeg ?? '-' }}</div>
                        <div><span class="font-medium">NUPTK:</span> {{ $guruDanStaff->nuptk ?? '-' }}</div>
                        <div><span class="font-medium">NPWP:</span> {{ $guruDanStaff->npwp ?? '-' }}</div>
                        <div><span class="font-medium">Pangkat/Golongan:</span>
                            {{ $guruDanStaff->pangkat_golongan ?? '-' }}</div>
                        <div><span class="font-medium">SK Nomor:</span> {{ $guruDanStaff->sk_nomor ?? '-' }}</div>
                        <div><span class="font-medium">SK Tanggal:</span>
                            {{ $guruDanStaff->sk_tanggal ? \Carbon\Carbon::parse($guruDanStaff->sk_tanggal)->translatedFormat('d F Y') : '-' }}
                        </div>
                        <div><span class="font-medium">SK TMT:</span>
                            {{ $guruDanStaff->sk_tmt ? \Carbon\Carbon::parse($guruDanStaff->sk_tmt)->translatedFormat('d F Y') : '-' }}
                        </div>
                        <div><span class="font-medium">Angka Kredit:</span> {{ $guruDanStaff->angka_kredit ?? '-' }}
                        </div>
                        <div><span class="font-medium">Masa Kerja:</span>
                            {{ $guruDanStaff->masa_kerja_tahun ?? 0 }} Tahun
                            {{ $guruDanStaff->masa_kerja_bulan ?? 0 }} Bulan
                        </div>
                        <div><span class="font-medium">Pendidikan Terakhir:</span>
                            {{ $guruDanStaff->pendidikan_terakhir ?? '-' }}
                        </div>
                        <div>
                            <span class="font-medium">TMT_KGB_TERAKHIR</span>
                            {{ $guruDanStaff->tmt_kgb_terakhir ? \Carbon\Carbon::parse($guruDanStaff->tmt_kgb_terakhir)->translatedFormat('d F Y') : '-' }}


                        </div>

                        <div><span class="font-medium">Sertifikasi:</span> {{ $guruDanStaff->sertifikasi ?? '-' }}
                        </div>
                        <div><span class="font-medium">TMT Bertugas:</span>
                            {{ $guruDanStaff->tmt_bertugas ? \Carbon\Carbon::parse($guruDanStaff->tmt_bertugas)->translatedFormat('d F Y') : '-' }}
                        </div>
                        <div><span class="font-medium">Keterangan:</span> {{ $guruDanStaff->ket ?? '-' }}</div>
                    </div>

                    {{-- Tombol Aksi --}}
                    <div class="mt-10 flex justify-end gap-3">
                        <a href="{{ route('guru_dan_staff.edit', $guruDanStaff->id) }}"
                            class="px-5 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Edit Data
                        </a>
                        {{-- tombol kembalo --}}
                        <a href="{{ route('guru_dan_staff.index') }}"
                            class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-white-700 transition">
                            ← Kembali
                        </a>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
