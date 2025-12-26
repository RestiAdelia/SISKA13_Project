<x-app-layout>

    {{-- ================= HEADER ================= --}}
    <div class="bg-white rounded-xl shadow p-4 mb-6">
        <div class="flex justify-between items-center">
            <div>
                <h2 class="text-lg font-bold text-gray-800">Edit Absensi Mingguan</h2>
                <p class="text-sm text-gray-500">
                    {{ $start->format('d M') }} – {{ $end->format('d M Y') }}
                </p>
            </div>

            <a href="{{ route('absen.index', request()->all()) }}" class="text-sm text-gray-600 hover:text-[#560029]">
                ← Kembali ke Rekap
            </a>
        </div>
    </div>

    <form method="POST" action="{{ route('absen.bulk.update') }}" id="absenForm">
        @csrf
        @method('PUT')

        @if (!empty($kelas_id) || request('kelas_id'))
            <input type="hidden" name="kelas_id" value="{{ $kelas_id ?? request('kelas_id') }}">
        @endif
        <input type="hidden" name="start_date" value="{{ $start->toDateString() }}">
        <input type="hidden" name="end_date" value="{{ $end->toDateString() }}">

        <div class="bg-white rounded-xl shadow overflow-x-auto">
            <table class="w-full text-sm text-center border-collapse">

                {{-- ===== HEADER ===== --}}
                <thead class="bg-gray-50">
                    <tr>
                        <th class="text-left px-4 py-3">Nama Siswa</th>
                        @for ($i = 0; $i < 7; $i++)
                            @php $d = $start->copy()->addDays($i); @endphp
                            <th class="px-3 py-3">
                                <div class="font-semibold">{{ $d->translatedFormat('D') }}</div>
                                <div class="text-xs text-gray-400">{{ $d->format('d/m') }}</div>
                            </th>
                        @endfor
                    </tr>
                </thead>

                {{-- ===== BODY ===== --}}
                <tbody>
                    @foreach ($siswa as $s)
                        <tr class="border-t hover:bg-gray-50">

                            {{-- INFO SISWA --}}
                            <td class="text-left px-4 py-3 font-semibold">
                                {{ $s->nama_siswa }}
                                <div class="text-xs text-gray-500">
                                    {{ $s->kelas->nama_kelas }}
                                </div>
                            </td>

                            {{-- ABSENSI --}}
                            @for ($i = 0; $i < 7; $i++)
                                @php
                                    $tgl = $start->copy()->addDays($i)->toDateString();
                                    $abs = $s->absens->firstWhere('date', $tgl);
                                    $status = $abs ? $abs->status : '';
                                @endphp

                                <td class="px-2 py-2">
                                    <input type="hidden" name="status[{{ $s->id }}][{{ $tgl }}]"
                                        id="status-{{ $s->id }}-{{ $tgl }}"
                                        value="{{ $status }}">

                                    <button type="button"
                                        onclick="cycle('{{ $s->id }}','{{ $tgl }}')"
                                        id="cell-{{ $s->id }}-{{ $tgl }}"
                                        class="px-3 py-2 rounded-lg text-xs font-semibold w-full
                        {{ $status == 'hadir'
                            ? 'bg-green-100 text-green-800'
                            : ($status == 'izin'
                                ? 'bg-yellow-100 text-yellow-800'
                                : ($status == 'sakit'
                                    ? 'bg-red-100 text-red-800'
                                    : ($status == 'alpha'
                                        ? 'bg-gray-200 text-gray-800'
                                        : 'bg-gray-50 text-gray-400'))) }}">
                                        {{ $status ? ucfirst($status) : '-' }}
                                    </button>
                                </td>
                            @endfor
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

        {{-- ==== ===== --}}
        <div class="fixed bottom-6 right-6 z-50">
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded-full shadow-lg hover:bg-green-700">
                💾 Simpan Semua
            </button>
        </div>

    </form>

    {{-- ================= SCRIPT ================= --}}
    <script>
        const order = ['', 'hadir', 'izin', 'sakit', 'alpha'];

        function cycle(siswa, date) {
            const input = document.getElementById(`status-${siswa}-${date}`);
            let current = input.value;
            let next = order[(order.indexOf(current) + 1) % order.length];
            input.value = next;

            const cell = document.getElementById(`cell-${siswa}-${date}`);
            cell.className = 'px-3 py-2 rounded-lg text-xs font-semibold w-full';

            switch (next) {
                case 'hadir':
                    cell.classList.add('bg-green-100', 'text-green-800');
                    cell.innerText = 'Hadir';
                    break;
                case 'izin':
                    cell.classList.add('bg-yellow-100', 'text-yellow-800');
                    cell.innerText = 'Izin';
                    break;
                case 'sakit':
                    cell.classList.add('bg-red-100', 'text-red-800');
                    cell.innerText = 'Sakit';
                    break;
                case 'alpha':
                    cell.classList.add('bg-gray-200', 'text-gray-800');
                    cell.innerText = 'Alpha';
                    break;
                default:
                    cell.classList.add('bg-gray-50', 'text-gray-400');
                    cell.innerText = '-';
            }
        }
    </script>

</x-app-layout>
