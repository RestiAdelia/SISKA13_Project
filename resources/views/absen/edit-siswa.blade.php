<x-app-layout>
     <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Edit Rekap Absensi Siswa') }}
            </h2>
        </div>
    </x-slot>
    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-5 mb-6">
        <div class="flex flex-col md:flex-row justify-between items-center gap-4">
            <div>
                <h2 class="text-xl font-bold text-gray-800">{{ $siswa->nama_siswa }}</h2>
                <p class="text-xs font-medium text-gray-400 uppercase tracking-widest mt-1">
                    {{ $start->translatedFormat('d M') }} – {{ $end->translatedFormat('d M Y') }} • 5 Hari Kerja
                </p>
            </div>

            <a href="{{ route('absen.index', ['start_date' => $start->toDateString()]) }}" 
               class="inline-flex items-center text-xs font-bold text-gray-500 hover:text-[#560029] transition uppercase tracking-tighter">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Rekap
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('absen.siswa.update', $siswa->id) }}" id="absenForm">
        @csrf
        @method('PUT')

        <input type="hidden" name="week" value="{{ $start->toDateString() }}">

        {{-- ================= TABEL EDIT ================= --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <table class="w-full text-sm text-center border-collapse">
                <thead class="bg-gray-50/50 border-b border-gray-200">
                    <tr>
                        <th class="text-left px-6 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-wider">Info Siswa</th>
                        @for ($i = 0; $i < 5; $i++)
                            @php $d = $start->copy()->addDays($i); @endphp
                            <th class="px-3 py-4 border-l border-gray-100">
                                <div class="font-bold text-gray-700 uppercase text-[11px]">{{ $d->translatedFormat('l') }}</div>
                                <div class="text-[10px] text-gray-400 font-normal">{{ $d->format('d/m') }}</div>
                            </th>
                        @endfor
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td class="text-left px-6 py-8 align-top">
                            <div class="font-bold text-gray-800 text-base leading-tight">{{ $siswa->nama_siswa }}</div>
                            <div class="text-[10px] text-gray-400 uppercase font-semibold mt-1">{{ $siswa->kelas->nama_kelas ?? '-' }}</div>
                        </td>

                        @for ($i = 0; $i < 5; $i++)
                            @php
                                $tgl = $start->copy()->addDays($i)->toDateString();
                                $abs = $absens->get($tgl);
                                $status = $abs ? $abs->status : '';
                                $ket = $abs ? $abs->keterangan : '';
                                
                                $statusClasses = [
                                    'hadir' => 'bg-white border-green-500 text-green-600',
                                    'izin'  => 'bg-white border-amber-400 text-amber-600',
                                    'sakit' => 'bg-white border-red-400 text-red-600',
                                    'alpha' => 'bg-white border-gray-800 text-gray-900',
                                    ''      => 'bg-white border-gray-100 border-dashed text-gray-300 shadow-none'
                                ];
                                $activeClass = $statusClasses[$status] ?? $statusClasses[''];
                            @endphp

                            <td class="px-3 py-6 border-l border-gray-50 align-top">
                                <div class="flex flex-col h-full">
                                    <input type="hidden" name="status[{{ $tgl }}]" id="status-{{ $tgl }}" value="{{ $status }}">
                                    
                                    <button type="button" onclick="cycle('{{ $tgl }}')" id="cell-{{ $tgl }}" 
                                            class="w-full min-w-[100px] py-3 rounded-t-lg text-[10px] font-bold uppercase transition-all duration-200 border-2 shadow-sm {{ $activeClass }}">
                                        {{ $status ?: 'Kosong' }}
                                    </button>

                                   
                                </div>
                            </td>
                        @endfor
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-8 space-y-6">
            <div class="bg-gray-50 border border-dashed border-gray-200 p-4 rounded-xl flex items-center gap-4">
                <div class="flex-shrink-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#560029]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                    </svg>
                </div>
                <div>
                    <p class="text-[11px] font-bold text-gray-700 uppercase tracking-wide">Tips Pengisian Cepat:</p>
                    <p class="text-[10px] text-gray-500 leading-relaxed">
                        Cukup <span >Klik / Tekan pada kotak status</span> (Hadir/Kosong) untuk merubah pilihan secara otomatis tanpa perlu mengetik satu persatu.
                    </p>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                {{-- Legend --}}
                <div class="flex items-center gap-4">
                    <div class="flex items-center gap-1.5 text-[9px] font-black text-gray-400 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-green-500"></span> Hadir
                    </div>
                    <div class="flex items-center gap-1.5 text-[9px] font-black text-gray-400 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-amber-400"></span> Izin
                    </div>
                    <div class="flex items-center gap-1.5 text-[9px] font-black text-gray-400 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-red-400"></span> Sakit
                    </div>
                    <div class="flex items-center gap-1.5 text-[9px] font-black text-gray-400 uppercase tracking-widest">
                        <span class="w-2 h-2 rounded-full bg-gray-800"></span> Alpha
                    </div>
                </div>

                <button type="submit" class="w-full md:w-auto bg-[#560029] text-white px-12 py-3.5 rounded-xl font-black uppercase text-xs tracking-[0.1em] hover:bg-black transition-all shadow-xl shadow-[#560029]/20 transform hover:-translate-y-1">
                    Simpan Absensi
                </button>
            </div>
        </div>
    </form>

    <script>
        const order = ['', 'hadir', 'izin', 'sakit', 'alpha'];
        function cycle(date) {
            const input = document.getElementById(`status-${date}`);
            let next = order[(order.indexOf(input.value) + 1) % order.length];
            input.value = next;

            const cell = document.getElementById(`cell-${date}`);
            cell.className = 'w-full min-w-[100px] py-3 rounded-t-lg text-[10px] font-bold uppercase transition-all duration-200 border-2 shadow-sm ';
            
            const colors = {
                'hadir': 'bg-white border-green-500 text-green-600',
                'izin' : 'bg-white border-amber-400 text-amber-600',
                'sakit': 'bg-white border-red-400 text-red-600',
                'alpha': 'bg-white border-gray-800 text-gray-900'
            };

            if (next) {
                cell.classList.add(...colors[next].split(' '));
                cell.innerText = next;
            } else {
                cell.classList.add('bg-white', 'border-gray-100', 'border-dashed', 'text-gray-300', 'shadow-none');
                cell.innerText = 'Kosong';
            }
        }
    </script>
</x-app-layout>