<x-app-layout>

    {{-- ================= FILTER ================= --}}
    <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

        <select name="kelas_id" class="border rounded px-3 py-2">
            <option value="">Semua Kelas</option>
            @foreach ($kelas as $k)
                <option value="{{ $k->id }}" {{ request('kelas_id') == $k->id ? 'selected' : '' }}>
                    {{ $k->nama_kelas }}
                </option>
            @endforeach
        </select>

        <input type="date" name="start_date" value="{{ request('start_date') }}" class="border rounded px-3 py-2">

        <input type="date" name="end_date" value="{{ request('end_date') }}" class="border rounded px-3 py-2">

        <button class="bg-[#560029] text-white rounded px-4">
            Filter
        </button>
    </form>

    <div class="mb-4 flex justify-end">
        <a href="{{ route('absen.bulk.edit', [
            'kelas_id' => request('kelas_id'),
            'week' => request('week'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
        ]) }}"
            class="btn btn-warning">
            ✏️ Edit Semua
        </a>
    </div>

    {{-- ================= TABEL REKAP (Grid per-hari) ================= --}}
    <div class="overflow-x-auto bg-white rounded-xl shadow">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-3">No</th>
                    <th class="px-4 py-3 text-left">Nama Siswa</th>
                    <th class="px-4 py-3">Kelas</th>

                    @for ($i = 0; $i < 7; $i++)
                        @php $d = $start->copy()->addDays($i); @endphp
                        <th class="px-3 py-3">
                            <div class="font-semibold">{{ $d->translatedFormat('D') }}</div>
                            <div class="text-xs text-gray-400">{{ $d->format('d/m') }}</div>
                        </th>
                    @endfor

                    <th class="px-4 py-3 text-center">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($siswa as $i => $s)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $i + 1 }}</td>

                        <td class="px-4 py-3 font-semibold text-left">
                            {{ $s->nama_siswa }}
                        </td>

                        <td class="px-4 py-3">{{ $s->kelas->nama_kelas ?? '-' }}</td>

                        @for ($j = 0; $j < 7; $j++)
                            @php
                                $tgl = $start->copy()->addDays($j)->toDateString();
                                $abs = $s->absens->firstWhere('date', $tgl);
                                $status = $abs ? $abs->status : '';
                            @endphp

                            <td class="px-2 py-2 text-center">
                                @if ($status == 'hadir')
                                    <span
                                        class="inline-block bg-green-100 text-green-800 px-3 py-1 rounded text-xs font-semibold">Hadir</span>
                                @elseif ($status == 'izin')
                                    <span
                                        class="inline-block bg-yellow-100 text-yellow-800 px-3 py-1 rounded text-xs font-semibold">Izin</span>
                                @elseif ($status == 'sakit')
                                    <span
                                        class="inline-block bg-red-100 text-red-800 px-3 py-1 rounded text-xs font-semibold">Sakit</span>
                                @elseif ($status == 'alpha')
                                    <span
                                        class="inline-block bg-gray-200 text-gray-800 px-3 py-1 rounded text-xs font-semibold">Alpha</span>
                                @else
                                    <span class="text-gray-400">-</span>
                                @endif
                            </td>
                        @endfor

                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('absen.siswa.edit', ['siswa' => $s->id, 'week' => $start->toDateString()]) }}"
                                class="inline-block bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</x-app-layout>
