<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\Absen;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AbsenController extends Controller
{
    // public function index(Request $request)
    // {
    //     Carbon::setLocale('id');
    //     $user = Auth::user();

    //     // 1. Logika Rentang Tanggal Otomatis (Input Start -> Auto End 5 Hari)
    //     if ($request->filled('start_date')) {
    //         $start = Carbon::parse($request->start_date)->startOfDay();
    //         // Otomatis tambahkan 4 hari dari start_date (Total 5 hari kerja)
    //         $end   = $start->copy()->addDays(4)->endOfDay();
    //     } else {
    //         // Default jika tidak ada filter: Ambil Senin - Jumat minggu ini
    //         $start = now()->startOfWeek(Carbon::MONDAY);
    //         $end   = $start->copy()->addDays(4)->endOfDay();
    //     }
    //     // 2. Tentukan ID Kelas yang akan difilter
    //     // Jika orang tua, kunci ke kelas mereka. Jika admin, ambil dari dropdown (jika ada).
    //     $targetKelasId = ($user->role === 'orangtua') ? $user->kelas_id : $request->kelas_id;

    //     // 3. Ambil List Kelas untuk Dropdown
    //     $kelas = ($user->role === 'orangtua')
    //         ? Kelas::where('id', $user->kelas_id)->get()
    //         : Kelas::orderBy('nama_kelas')->get();

    //     // 4. Ambil Data Siswa dengan Filter yang Fleksibel
    //     $siswa = Siswa::with([
    //         'kelas',
    //         'absens' => fn($q) => $q->whereBetween('date', [$start->toDateString(), $end->toDateString()])
    //     ])
    //         ->when($targetKelasId, function ($query) use ($targetKelasId) {
    //             // Hanya filter jika targetKelasId ada isinya
    //             return $query->where('kelas_id', $targetKelasId);
    //         })
    //         ->orderBy('nama_siswa')
    //         ->get();

    //     return view('absen.index', compact('kelas', 'start', 'end', 'siswa'));
    // }
    public function index(Request $request)
    {
        Carbon::setLocale('id');
        $user = Auth::user();

        // 1. Logika Rentang Tanggal
        if ($request->filled('start_date')) {
            $start = Carbon::parse($request->start_date)->startOfDay();
            $end   = $start->copy()->addDays(4)->endOfDay();
        } else {
            $start = now()->startOfWeek(Carbon::MONDAY);
            $end   = $start->copy()->addDays(4)->endOfDay();
        }

        $targetKelasId = ($user->role === 'orangtua') ? $user->kelas_id : $request->kelas_id;

        $kelas = ($user->role === 'orangtua')
            ? Kelas::where('id', $user->kelas_id)->get()
            : Kelas::orderBy('nama_kelas')->get();

        // 4. Ambil Data Siswa dengan PAGINATE
        $siswa = Siswa::with([
            'kelas',
            'absens' => fn($q) => $q->whereBetween('date', [$start->toDateString(), $end->toDateString()])
        ])
            ->when($targetKelasId, function ($query) use ($targetKelasId) {
                return $query->where('kelas_id', $targetKelasId);
            })
            ->orderBy('nama_siswa')
            ->paginate(10) // Ubah ke 10
            ->withQueryString(); // Menjaga filter tetap ada di URL pagination

        return view('absen.index', compact('kelas', 'start', 'end', 'siswa'));
    }
    // public function editSiswa(Siswa $siswa, Request $request)
    // {
    //     $user = Auth::user();

    //     // Keamanan: Jika orang tua mencoba akses ID siswa dari kelas lain via URL
    //     if ($user->role === 'orangtua' && $siswa->kelas_id !== $user->kelas_id) {
    //         abort(403, 'Anda tidak memiliki akses ke data siswa ini.');
    //     }

    //     $week = $request->week ? Carbon::parse($request->week) : now();
    //     $start = $week->copy()->startOfWeek(Carbon::MONDAY);
    //     $end = $start->copy()->addDays(4);

    //     $absens = Absen::where('siswa_id', $siswa->id)
    //         ->whereBetween('date', [$start->toDateString(), $end->toDateString()])
    //         ->get()
    //         ->keyBy('date');

    //     return view('absen.edit-siswa', compact('siswa', 'start', 'end', 'absens'));
    // }
public function editSiswa(Siswa $siswa, Request $request)
{
    $user = Auth::user();

    // Pastikan locale diatur ke Indonesia
    \Carbon\Carbon::setLocale('id');

    if ($user->role === 'orangtua' && $siswa->kelas_id !== $user->kelas_id) {
        abort(403, 'Anda tidak memiliki akses ke data siswa ini.');
    }

    $week = $request->week ? \Carbon\Carbon::parse($request->week) : now();
    $start = $week->copy()->startOfWeek(\Carbon\Carbon::MONDAY);
    $end = $start->copy()->addDays(4);

    $absens = Absen::where('siswa_id', $siswa->id)
        ->whereBetween('date', [$start->toDateString(), $end->toDateString()])
        ->get()
        ->keyBy('date');

    return view('absen.edit-siswa', compact('siswa', 'start', 'end', 'absens'));
}
    public function updateSiswa(Request $request, Siswa $siswa)
    {
        $user = Auth::user();

        // Keamanan: Mencegah update data siswa kelas lain via Postman/Request manual
        if ($user->role === 'orangtua' && $siswa->kelas_id !== $user->kelas_id) {
            abort(403);
        }

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

        return redirect()->route('absen.index', ['week' => $request->week])->with('success', 'Absensi berhasil disimpan');
    }

    public function show(Siswa $siswa, Request $request)
    {
        $user = Auth::user();

        // Keamanan: Orang tua hanya bisa melihat detail siswa di kelasnya
        if ($user->role === 'orangtua' && $siswa->kelas_id !== $user->kelas_id) {
            abort(403);
        }

        \Illuminate\Support\Carbon::setLocale('id');

        // Logic: Jika ada input start_date, ambil 5 hari kerja. 
        // Jika tidak ada, default ke hari Senin minggu ini.
        if ($request->filled('start_date')) {
            $start = \Illuminate\Support\Carbon::parse($request->start_date)->startOfDay();
            $end   = $start->copy()->addDays(4)->endOfDay();
        } else {
            $start = now()->startOfWeek(\Illuminate\Support\Carbon::MONDAY);
            $end   = $start->copy()->addDays(4)->endOfDay();
        }

        $absens = $siswa->absens()
            ->whereBetween('date', [$start->toDateString(), $end->toDateString()])
            ->orderBy('date', 'asc')
            ->get();

        $stats = [
            'hadir' => $absens->where('status', 'hadir')->count(),
            'izin'  => $absens->where('status', 'izin')->count(),
            'sakit' => $absens->where('status', 'sakit')->count(),
            'alpha' => $absens->where('status', 'alpha')->count(),
            'total' => $absens->count()
        ];

        return view('absen.show', compact('siswa', 'absens', 'start', 'end', 'stats'));
    }
}
