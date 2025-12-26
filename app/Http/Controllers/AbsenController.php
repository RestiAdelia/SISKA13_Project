<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Absen;
use Illuminate\Http\Request;

class AbsenController extends Controller
{
    /**
     * ===============================
     * INDEX / REKAP
     * ===============================
     */
    public function index(Request $request)
    {
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $start = Carbon::parse($request->start_date)->startOfDay();
            $end   = Carbon::parse($request->end_date)->endOfDay();
        } else {
            $week  = $request->week ? Carbon::parse($request->week) : now();
            $start = $week->copy()->startOfWeek(Carbon::MONDAY);
            $end   = $week->copy()->endOfWeek(Carbon::SUNDAY);
        }

        $kelas = Kelas::orderBy('nama_kelas')->get();

        $rekap = Siswa::with('kelas')
            ->when(
                $request->kelas_id,
                fn($q) =>
                $q->where('kelas_id', $request->kelas_id)
            )
            ->orderBy('nama_siswa')
            ->get()
            ->map(function ($s) use ($start, $end) {
                return (object) [
                    'siswa_id'   => $s->id,
                    'kelas_id'   => $s->kelas_id,
                    'nama_siswa' => $s->nama_siswa,
                    'nama_kelas' => $s->kelas->nama_kelas ?? '-',
                    'hadir' => $s->absens()->whereBetween('date', [$start, $end])->where('status', 'hadir')->count(),
                    'izin'  => $s->absens()->whereBetween('date', [$start, $end])->where('status', 'izin')->count(),
                    'sakit' => $s->absens()->whereBetween('date', [$start, $end])->where('status', 'sakit')->count(),
                    'alpha' => $s->absens()->whereBetween('date', [$start, $end])->where('status', 'alpha')->count(),
                ];
            });

        // Also load siswa with absens for the week so the index can show day-by-day values
        $siswa = Siswa::with([
            'kelas',
            'absens' => fn($q) =>
            $q->whereBetween('date', [$start->toDateString(), $end->toDateString()])
        ])
            ->when($request->kelas_id, fn($q) => $q->where('kelas_id', $request->kelas_id))
            ->orderBy('nama_siswa')
            ->get();

        return view('absen.index', compact('rekap', 'kelas', 'start', 'end', 'siswa'));
    }

    /**
     * ===============================
     * EDIT MASSAL (SEMUA SISWA)
     * ===============================
     */
    public function edit(Request $request)
    {
        $request->validate([
            'kelas_id'   => 'nullable|exists:kelas,id',
            'start_date' => 'nullable|date',
            'week' => 'nullable|date',
        ]);

        // determine week start/end: prefer explicit start_date, then week param, then current week
        if ($request->filled('start_date')) {
            $start = Carbon::parse($request->start_date)->startOfDay();
            $end = $request->filled('end_date') ? Carbon::parse($request->end_date)->endOfDay() : $start->copy()->addDays(6);
        } elseif ($request->filled('week')) {
            $week = Carbon::parse($request->week);
            $start = $week->copy()->startOfWeek(Carbon::MONDAY)->startOfDay();
            $end = $week->copy()->endOfWeek(Carbon::SUNDAY)->endOfDay();
        } else {
            $week = now();
            $start = $week->copy()->startOfWeek(Carbon::MONDAY)->startOfDay();
            $end = $week->copy()->endOfWeek(Carbon::SUNDAY)->endOfDay();
        }

        // ambil siswa (semua jika kelas_id tidak diberikan)
        $siswa = Siswa::when($request->kelas_id, fn($q) => $q->where('kelas_id', $request->kelas_id))
            ->orderBy('nama_siswa')
            ->get();

        // ambil absensi
        $absens = Absen::whereBetween('date', [
            $start->toDateString(),
            $end->toDateString()
        ])
            ->whereIn('siswa_id', $siswa->pluck('id'))
            ->get()
            ->groupBy(fn($a) => $a->siswa_id . '_' . $a->date);

        return view('absen.edit', [
            'siswa' => $siswa,
            'absens' => $absens,
            'start' => $start,
            'end' => $end,
            'kelas_id' => $request->kelas_id,
        ]);
    }

    /**
     * ===============================
     * UPDATE MASSAL
     * ===============================
     */
    public function update(Request $request)
    {
        $request->validate([
            'kelas_id' => 'nullable|exists:kelas,id',
            'status'   => 'required|array',
        ]);

        // prefetch siswa->kelas mapping to avoid N+1 when kelas_id not provided
        $siswaIds = array_keys($request->status ?? []);
        $kelasMap = Siswa::whereIn('id', $siswaIds)->pluck('kelas_id', 'id')->toArray();

        foreach ($request->status as $siswaId => $dates) {
            foreach ($dates as $date => $status) {

                if (!$status) continue;

                Absen::updateOrCreate(
                    [
                        'siswa_id' => $siswaId,
                        'date' => $date,
                    ],
                    [
                        'kelas_id' => $request->kelas_id ?? ($kelasMap[$siswaId] ?? null),
                        'status' => $status,
                    ]
                );
            }
        }

        return redirect()
            ->route('absen.index', [
                'kelas_id' => $request->kelas_id,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date,
            ])
            ->with('success', 'Absensi berhasil disimpan');
    }

    /**
     * ===============================
     * EDIT SISWA (SINGLE STUDENT)
     * ===============================
     */
    public function editSiswa(Siswa $siswa, Request $request)
    {
        $week = $request->week ? Carbon::parse($request->week) : now();
        $start = $week->copy()->startOfWeek(Carbon::MONDAY);
        $end = $week->copy()->endOfWeek(Carbon::SUNDAY);

        $absens = Absen::where('siswa_id', $siswa->id)
            ->whereBetween('date', [
                $start->toDateString(),
                $end->toDateString(),
            ])
            ->get()
            ->keyBy('date');

        return view('absen.edit-siswa', compact('siswa', 'start', 'end', 'absens'));
    }

    public function updateSiswa(Request $request, Siswa $siswa)
    {
        $data = $request->validate([
            'status' => 'required|array',
            'status.*' => 'nullable|in:hadir,izin,sakit,alpha',
            'week' => 'nullable|date',
        ]);

        foreach ($data['status'] as $date => $status) {
            if (!$status) continue;

            Absen::updateOrCreate([
                'siswa_id' => $siswa->id,
                'date' => $date,
            ], [
                'status' => $status,
                'kelas_id' => $siswa->kelas_id,
            ]);
        }

        $params = [];
        if ($request->filled('week')) $params['week'] = $request->week;

        return redirect()->route('absen.index', $params)->with('success', 'Absensi berhasil disimpan');
    }

    /**
     * Alias untuk mengakses halaman edit massal (route `absen.bulk.edit`)
     */
    public function bulkEdit(Request $request)
    {
        return $this->edit($request);
    }

    /**
     * Alias untuk menyimpan data massal (route `absen.bulk.update`)
     */
    public function bulkUpdate(Request $request)
    {
        return $this->update($request);
    }

    /**
     * Redirect resource `show` to per-siswa edit page to avoid missing method errors
     */
    public function show(Absen $absen)
    {
        if (!$absen || !$absen->siswa_id) {
            return redirect()->route('absen.index')->with('error', 'Data absen tidak ditemukan');
        }

        return redirect()->route('absen.siswa.edit', [
            'siswa' => $absen->siswa_id,
            'week'  => $absen->date,
        ]);
    }
}
