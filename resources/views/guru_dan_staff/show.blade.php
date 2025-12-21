<x-app-layout>
    <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Detail Staf & Guru') }}
            </h2>
        </div>
    </x-slot>


    <!-- Background Gradasi Senada Section Kepsek -->
    <div class="py-10 min-h-screen bg-white bg-gradient-to-br from-gray-50 to-gray-100">
        <div class="max-w-5xl mx-auto px-4">
            
            <!-- Title Section: Kiri, Line di Tengah -->
            <div class="text-start mb-10">
                <h2 class="relative inline-block pb-4 text-3xl font-extrabold text-gray-800">
                    Profil Lengkap
                    <span class="absolute bottom-0 left-1/2 -translate-x-1/2 w-12 h-1.5 bg-[#800000] rounded-full"></span>
                </h2>
            </div>

            <div class="bg-white shadow-2xl rounded-[40px] overflow-hidden border border-white">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    
                    {{-- SISI FOTO (Gaya Foto Kepsek) --}}
                    <div class="p-8 bg-gray-50/50 flex flex-col items-center border-r border-gray-100 relative">
                        <!-- Ornamen Dekoratif Blur -->
                        <div class="absolute top-20 w-40 h-40 bg-[#800000] opacity-5 rounded-full blur-3xl"></div>

                        <div class="relative">
                            @if ($guruDanStaff->foto)
                                <img src="{{ asset('uploads/' . $guruDanStaff->foto) }}" alt="{{ $guruDanStaff->nama }}"
                                    class="relative z-10 rounded-[30px] shadow-xl w-60 h-72 object-cover border-8 border-white transition-transform duration-500 hover:scale-105">
                            @else
                                <div class="relative z-10 rounded-[30px] shadow-md w-60 h-72 bg-gray-200 flex items-center justify-center border-8 border-white text-gray-400">
                                    <span class="text-sm italic">Tidak ada foto</span>
                                </div>
                            @endif
                        </div>

                        <h3 class="text-2xl font-bold text-gray-800 mt-6 text-center leading-tight">
                            {{ $guruDanStaff->nama }}
                        </h3>
                        <p class="text-[#800000] font-semibold mt-1">{{ $guruDanStaff->jabatan ?? '-' }}</p>
                        
                      <div class="mt-8 w-full flex flex-row gap-3">
    <!-- Tombol Edit (Setengah Lebar) -->
    <a href="{{ route('guru_dan_staff.edit', $guruDanStaff->id) }}"
        class="flex-1 flex items-center justify-center px-4 py-3 bg-[#800000] hover:bg-black text-white rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-maroon/20 text-sm">
        <i class="bi bi-pencil-square me-2"></i> Edit
    </a>
     <a href="{{ route('guru_dan_staff.index', $guruDanStaff->id) }}"
        class="flex-1 flex items-center justify-center px-4 py-3  rounded-2xl font-bold transition-all duration-300 shadow-lg shadow-maroon/20 text-sm">
        <i class="bi bi-pencil-square me-2"></i>Back
    </a>

    <!-- Tombol Delete (Setengah Lebar) -->
   
</div>
                    </div>

                    {{-- SISI DETAIL DATA --}}
                    <div class="md:col-span-2 p-8 lg:p-12">
                        
                        <!-- Informasi Pribadi -->
                        <div class="mb-10">
                            <h4 class="text-sm font-bold text-[#800000] uppercase tracking-[2px] mb-6 flex items-center">
                                <span class="w-8 h-[2px] bg-[#800000] mr-3"></span> Informasi Pribadi
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <div class="border-b border-gray-100 pb-2">
                                    <p class="text-xs text-gray-400 uppercase font-bold">NIP</p>
                                    <p class="text-gray-800 font-medium">{{ $guruDanStaff->nip ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-100 pb-2">
                                    <p class="text-xs text-gray-400 uppercase font-bold">Jenis Kelamin</p>
                                    <p class="text-gray-800 font-medium">{{ $guruDanStaff->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>
                                </div>
                                <div class="border-b border-gray-100 pb-2">
                                    <p class="text-xs text-gray-400 uppercase font-bold">Tempat Lahir</p>
                                    <p class="text-gray-800 font-medium">{{ $guruDanStaff->tempat_lahir ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-100 pb-2">
                                    <p class="text-xs text-gray-400 uppercase font-bold">Tanggal Lahir</p>
                                    <p class="text-gray-800 font-medium">{{ $guruDanStaff->tanggal_lahir ? \Carbon\Carbon::parse($guruDanStaff->tanggal_lahir)->translatedFormat('d F Y') : '-' }}</p>
                                </div>
                                <div class="sm:col-span-2 border-b border-gray-100 pb-2">
                                    <p class="text-xs text-gray-400 uppercase font-bold">Alamat</p>
                                    <p class="text-gray-800 font-medium">{{ $guruDanStaff->alamat ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Informasi Kepegawaian -->
                        <div>
                            <h4 class="text-sm font-bold text-black uppercase tracking-[2px] mb-6 flex items-center">
                                <span class="w-8 h-[2px] bg-black mr-3"></span> Kepegawaian
                            </h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-x-8 gap-y-5">
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">No Karpeg / NUPTK</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->no_karpeg ?? '-' }} / {{ $guruDanStaff->nuptk ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">Pangkat/Golongan</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->pangkat_golongan ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">NPWP</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->npwp ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">Pendidikan</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->pendidikan_terakhir ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">Masa Kerja</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->masa_kerja_tahun ?? 0 }} Th, {{ $guruDanStaff->masa_kerja_bulan ?? 0 }} Bln</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">Sertifikasi</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->sertifikasi ?? '-' }}</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">SK TMT</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->sk_tmt ? \Carbon\Carbon::parse($guruDanStaff->sk_tmt)->translatedFormat('d F Y') : '-' }}</p>
                                </div>
                                <div class="border-b border-gray-50 pb-1">
                                    <p class="text-[10px] text-gray-400 uppercase font-bold">Keterangan</p>
                                    <p class="text-sm text-gray-800">{{ $guruDanStaff->ket ?? '-' }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>