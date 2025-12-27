<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\GuruDanStaff;
use App\Models\Kegiatan;
use App\Models\Absen;
use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $lastUpdateVisiMisi = DB::table('visi_misi')->latest('updated_at')->value('updated_at');

        // --- LOGIC ADMIN ---
        if ($user->role === 'admin') {
            // ... (Logic admin tetap sama seperti sebelumnya)
            $data = [
                'count_siswa' => Siswa::count(),
                'count_guru'  => GuruDanStaff::count(),
                'count_kelas' => Kelas::count(),
                'count_mou'   => DB::table('mou')->count(),
                'total_kegiatan' => Kegiatan::count(),
                'last_update_visi_misi' => $lastUpdateVisiMisi,
                'chart_labels' => DB::table('siswa')
                    ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
                    ->select('kelas.nama_kelas', DB::raw('COUNT(siswa.id) AS total_siswa'))
                    ->groupBy('kelas.nama_kelas', 'kelas.id')->get()->pluck('nama_kelas'),
                'chart_data' => DB::table('siswa')
                    ->join('kelas', 'siswa.kelas_id', '=', 'kelas.id')
                    ->select('kelas.nama_kelas', DB::raw('COUNT(siswa.id) AS total_siswa'))
                    ->groupBy('kelas.nama_kelas', 'kelas.id')->get()->pluck('total_siswa'),
                
            ];
            return view('dashboard', compact('user', 'data'));
        }

        // --- LOGIC ORANG TUA ---
        if ($user->role === 'orangtua') {
            $kelas_id = $user->kelas_id;
            $detailKelas = DB::table('kelas')->where('id', $kelas_id)->first();

            $detailKelas = DB::table('kelas')->where('id', $kelas_id)->first();

            // LOGIKA ANDA: Ambil nama mata pelajaran UNIK dari tabel absens
            $mata_pelajaran_array = DB::table('kelas')
                ->where('id', $kelas_id)
                ->whereNotNull('mata_pelajaran')
                ->distinct()
                ->pluck('mata_pelajaran')
                ->toArray();

            $data = [
                'nama_kelas' => $detailKelas->nama_kelas ?? 'N/A',
                'mata_pelajaran' => $mata_pelajaran_array, // Ini sekarang berisi array murni ['IPA', 'MTK']
                'total_siswa_sekelas' => DB::table('siswa')->where('kelas_id', $kelas_id)->count(),
                'total_kegiatan' => DB::table('kegiatan')->count(), // sesuaikan nama tabel kegiatan Anda
                'tugas_mendatang' => DB::table('tugas')->where('kelas_id', $kelas_id)->where('deadline', '>=', now())->count(),
                'absensi_anak' => DB::table('absens')->where('kelas_id', $kelas_id)->latest()->take(5)->get(),
                'persentase_hadir' => $this->hitungPersentaseHadir($kelas_id),
                'last_update_visi_misi' => DB::table('visi_misi')->latest('updated_at')->value('updated_at'),
                'tugas_terbaru' => DB::table('tugas')->where('kelas_id', $kelas_id)->latest()->first()
            ];

            return view('dashboard', compact('user', 'data'));
        }

        return redirect('/');
    }
    private function hitungPersentaseHadir($kelas_id)
    {
        $total = Absen::where('kelas_id', $kelas_id)->count();
        if ($total == 0) return 0;

        $hadir = Absen::where('kelas_id', $kelas_id)->where('status', 'hadir')->count();
        return round(($hadir / $total) * 100, 1);
    }
}
