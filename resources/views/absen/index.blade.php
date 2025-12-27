<x-app-layout>
     <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Data Rekap Absensi') }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 mb-6">
        <form method="GET" class="flex flex-col md:flex-row items-end gap-4">
            @if (auth()->user()->role !== 'orangtua')
                <div class="w-full md:w-48">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1 tracking-wider">Kelas</label>
                    <select name="kelas_id"
                        class="w-full border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-[#560029] focus:border-[#560029]">
                        <option value="">Semua Kelas</option>
                        @foreach ($kelas as $k)
                            <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                                {{ $k->nama_kelas }}
                            </option>
                        @endforeach
                    </select>
                </div>
            @else
                <div class="w-full md:w-48">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1 tracking-wider">Kelas
                        Anda</label>
                    <div
                        class="px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-50 rounded-lg border border-gray-200">
                        {{ auth()->user()->kelas->nama_kelas ?? 'N/A' }}
                    </div>
                    <input type="hidden" name="kelas_id" value="{{ auth()->user()->kelas_id }}">
                </div>
            @endif
            <div class="w-full md:w-48">
                <label class="block text-[10px] font-bold text-gray-400 uppercase mb-1 tracking-wider">Tanggal
                    Mulai</label>
                <input type="date" name="start_date" value="{{ $start->toDateString() }}"
                    class="w-full border-gray-200 rounded-lg px-3 py-2 text-sm focus:ring-[#560029] focus:border-[#560029]">
            </div>
            <div class="flex-1 pb-2">
                <p class="text-xs text-gray-400 italic">
                    Menampilkan data sampai: <span
                        class="font-semibold text-gray-600">{{ $end->translatedFormat('d F Y') }}</span>
                </p>
            </div>

            <button type="submit"
                class="w-full md:w-auto bg-[#560029] text-white rounded-lg px-6 py-2 text-sm font-bold uppercase transition hover:bg-black">
                Filter
            </button>
        </form>
    </div>
    <div class="overflow-hidden bg-white rounded-xl shadow-sm border border-gray-200">
        <table class="w-full text-sm border-collapse">
            <thead>
                <tr class="bg-gray-50 text-gray-500 border-b">
                    <th class="px-4 py-3 font-bold uppercase text-[10px] text-center w-10">No</th>
                    <th class="px-4 py-3 font-bold uppercase text-[10px] text-left min-w-[200px]">Nama Siswa</th>
                    @for ($i = 0; $i < 5; $i++)
                        @php $d = $start->copy()->addDays($i); @endphp
                        <th class="px-2 py-3 border-l border-gray-100 w-24 text-center">
                            <div class="font-bold text-gray-700">{{ $d->translatedFormat('D') }}</div>
                            <div class="text-[9px] font-normal">{{ $d->format('d/m') }}</div>
                        </th>
                    @endfor
                    <th class="px-2 py-3 border-l border-gray-200 text-green-600 w-10">H</th>
                    <th class="px-2 py-3 border-l border-gray-100 text-amber-500 w-10">I</th>
                    <th class="px-2 py-3 border-l border-gray-100 text-red-500 w-10">S</th>
                    <th class="px-2 py-3 border-l border-gray-100 text-gray-500 w-10">A</th>

                    <th class="px-4 py-3 text-center border-l border-gray-200 uppercase text-[10px]">Aksi</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-100">
                @foreach ($siswa as $index => $s)
                    @php
                        $totalHadir = $s->absens->where('status', 'hadir')->count();
                        $totalIzin = $s->absens->where('status', 'izin')->count();
                        $totalSakit = $s->absens->where('status', 'sakit')->count();
                        $totalAlpha = $s->absens->where('status', 'alpha')->count();
                    @endphp
                    <tr class="hover:bg-gray-50/50 transition">
                        <td class="px-4 py-3 text-center text-gray-400 text-xs">
                            {{ $siswa->firstItem() + $index }}
                        </td>

                        <td class="px-4 py-3">
                            <div class="font-semibold text-gray-800">{{ $s->nama_siswa }}</div>
                            <div class="text-[10px] text-gray-400">{{ $s->kelas->nama_kelas ?? '-' }}</div>
                        </td>
                        @for ($j = 0; $j < 5; $j++)
                            @php
                                $tgl = $start->copy()->addDays($j)->toDateString();
                                $abs = $s->absens->firstWhere('date', $tgl);
                                $status = $abs ? $abs->status : '';
                            @endphp
                            <td class="px-2 py-3 border-l border-gray-50 text-center">
                                @if ($status == 'hadir')
                                    <span class="text-green-500 font-bold">✔</span>
                                @elseif ($status == 'izin')
                                    <span
                                        class="inline-block w-6 py-0.5 rounded bg-amber-50 text-amber-600 text-[10px] font-bold border border-amber-100">I</span>
                                @elseif ($status == 'sakit')
                                    <span
                                        class="inline-block w-6 py-0.5 rounded bg-red-50 text-red-600 text-[10px] font-bold border border-red-100">S</span>
                                @elseif ($status == 'alpha')
                                    <span
                                        class="inline-block w-6 py-0.5 rounded bg-gray-100 text-gray-600 text-[10px] font-bold border border-gray-200">A</span>
                                @else
                                    <span class="text-gray-200">-</span>
                                @endif
                            </td>
                        @endfor

                        <td class="px-2 py-3 border-l border-gray-100 text-center font-semibold text-gray-700">
                            {{ $totalHadir }}</td>
                        <td class="px-2 py-3 border-l border-gray-100 text-center font-semibold text-gray-700">
                            {{ $totalIzin }}</td>
                        <td class="px-2 py-3 border-l border-gray-100 text-center font-semibold text-gray-700">
                            {{ $totalSakit }}</td>
                        <td class="px-2 py-3 border-l border-gray-100 text-center font-semibold text-gray-700">
                            {{ $totalAlpha }}</td>

                        {{-- Aksi --}}
                        <td class="px-4 py-3 border-l border-gray-100 whitespace-nowrap text-center">
                        <td class="px-4 py-3 border-l border-gray-100 whitespace-nowrap text-center">
                            <div class="flex items-center justify-center gap-2">
                                <a href="{{ route('absen.siswa.show', ['siswa' => $s->id, 'start_date' => $start->toDateString()]) }}"
                                    class="p-1.5 text-gray-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all duration-200 group"
                                    title="Lihat Detail">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                @if (Auth::user()->role !== 'orangtua')
                                    <a href="{{ route('absen.siswa.edit', ['siswa' => $s->id, 'week' => $start->toDateString()]) }}"
                                        class="p-1.5 text-gray-400 hover:text-amber-600 hover:bg-amber-50 rounded-lg transition-all duration-200 group"
                                        title="Edit Absensi">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                @endif

                            </div>
                        </td>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $siswa->links() }}
    </div>

    <div class="mt-4 flex items-center gap-4 text-[10px] text-gray-400 uppercase font-bold tracking-widest">
        <span>H: Hadir</span>
        <span>I: Izin</span>
        <span>S: Sakit</span>
        <span>A: Alpha</span>
    </div>
</x-app-layout>
