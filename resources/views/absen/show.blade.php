<x-app-layout>
     <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Detail Absensi Siswa') }}
            </h2>
        </div>
    </x-slot>
    <div class="max-w-6xl mx-auto py-6 px-4">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 items-start">
            <div class="lg:col-span-4 lg:sticky lg:top-6 space-y-4">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-5">
                    <a href="{{ route('absen.index', ['start_date' => $start->toDateString()]) }}" 
                       class="inline-flex items-center text-[10px] font-bold text-[#560029] uppercase tracking-widest mb-4 hover:opacity-70 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>

                    <div class="flex items-center gap-4">
                        <div class="h-14 w-14 bg-gradient-to-br from-[#560029] to-[#800040] text-white rounded-2xl flex items-center justify-center text-xl font-bold shadow-md">
                            {{ substr($siswa->nama_siswa, 0, 1) }}
                        </div>
                        <div class="overflow-hidden">
                            <h1 class="text-lg font-bold text-gray-800 truncate leading-tight">{{ $siswa->nama_siswa }}</h1>
                            <p class="text-xs text-gray-500 font-medium">{{ $siswa->kelas->nama_kelas ?? '-' }}</p>
                            <p class="text-[10px] text-gray-400 font-bold uppercase mt-1">NISN: {{ $siswa->nisn ?? '-' }}</p>
                        </div>
                    </div>

                    <div class="mt-6 pt-5 border-t border-gray-50">
                        <label class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-2 block">Filter Rentang</label>
                        <form method="GET" class="flex gap-2">
                            <input type="date" name="start_date" value="{{ $start->toDateString() }}" 
                                   class="flex-1 bg-gray-50 border-none rounded-xl text-xs font-bold text-gray-600 focus:ring-2 focus:ring-[#560029]/20">
                            <button class="bg-[#560029] text-white px-3 rounded-xl hover:bg-black transition shadow-sm">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>

                {{-- Statistik Card (Versi Compact di Samping) --}}
                <div class="grid grid-cols-2 gap-3">
                    <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm">
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Hadir</p>
                        <p class="text-lg font-black text-green-600">{{ $stats['hadir'] }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm">
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Izin</p>
                        <p class="text-lg font-black text-amber-500">{{ $stats['izin'] }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm">
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Sakit</p>
                        <p class="text-lg font-black text-red-500">{{ $stats['sakit'] }}</p>
                    </div>
                    <div class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm">
                        <p class="text-[9px] font-bold text-gray-400 uppercase tracking-widest">Alpha</p>
                        <p class="text-lg font-black text-gray-800">{{ $stats['alpha'] }}</p>
                    </div>
                </div>
            </div>

            {{-- KOLOM KANAN: Tabel Riwayat --}}
            <div class="lg:col-span-8">
                <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
                    <div class="px-6 py-4 bg-gray-50/50 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="text-xs font-bold text-gray-500 uppercase tracking-[0.2em]">Riwayat Absensi</h3>
                        <span class="text-[10px] font-bold text-[#560029] bg-[#560029]/5 px-3 py-1 rounded-full">
                            {{ $start->translatedFormat('d M') }} — {{ $end->translatedFormat('d M Y') }}
                        </span>
                    </div>
                    
                    <div class="overflow-x-auto overflow-y-auto max-h-[600px]"> {{-- Beri max-height agar tidak terlalu panjang ke bawah --}}
                        <table class="w-full">
                            <thead class="sticky top-0 bg-white shadow-sm z-10">
                                <tr class="text-gray-400 text-[10px] font-black uppercase tracking-widest border-b border-gray-50">
                                    <th class="px-6 py-4 text-left">Hari / Tanggal</th>
                                    <th class="px-6 py-4 text-center w-32">Status</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-50">
                                @forelse ($absens as $absen)
                                    <tr class="hover:bg-gray-50 transition-colors group">
                                        <td class="px-6 py-4">
                                            <div class="font-bold text-gray-700 group-hover:text-[#560029]">{{ \Carbon\Carbon::parse($absen->date)->translatedFormat('l') }}</div>
                                            <div class="text-[10px] text-gray-400">{{ \Carbon\Carbon::parse($absen->date)->translatedFormat('d F Y') }}</div>
                                        </td>
                                        <td class="px-6 py-4 text-center">
                                            @php
                                                $styles = [
                                                    'hadir' => 'bg-green-50 text-green-600 border-green-200',
                                                    'izin'  => 'bg-amber-50 text-amber-600 border-amber-200',
                                                    'sakit' => 'bg-red-50 text-red-600 border-red-200',
                                                    'alpha' => 'bg-gray-900 text-white border-gray-900',
                                                ][$absen->status] ?? 'bg-gray-50 text-gray-400 border-gray-100';
                                            @endphp
                                            <span class="inline-block w-20 py-1 border rounded-lg text-[9px] font-black uppercase tracking-widest shadow-sm {{ $styles }}">
                                                {{ $absen->status }}
                                            </span>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="px-6 py-20 text-center">
                                            <p class="text-[10px] font-bold text-gray-300 uppercase tracking-widest italic">Tidak ada data untuk periode ini</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>