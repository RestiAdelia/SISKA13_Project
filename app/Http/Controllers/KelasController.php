<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\GuruDanStaff;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Tampilkan daftar kelas
     */
  public function index(Request $request)
{
    $query = Kelas::with('guru')
        ->orderBy('tahun_ajar', 'desc')
        ->orderByRaw('CAST(REGEXP_REPLACE(LOWER(nama_kelas), "[^0-9]", "") AS UNSIGNED) ASC')
        ->orderByRaw('LOWER(nama_kelas) ASC'); 

    // Filter berdasarkan tahun ajar
    if ($request->filled('tahun_ajar')) {
        $query->where('tahun_ajar', $request->tahun_ajar);
    }

    // Pencarian nama kelas atau guru
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('nama_kelas', 'like', "%$search%")
                ->orWhereHas('guru', function ($guruQuery) use ($search) {
                    $guruQuery->where('nama', 'like', "%$search%");
                });
        });
    }

    $kelas = $query->paginate(10);

    // Daftar filter tahun ajar
    $daftar_tahun = Kelas::select('tahun_ajar')
        ->distinct()
        ->orderBy('tahun_ajar', 'desc')
        ->pluck('tahun_ajar');

    return view('kelas.index', compact('kelas', 'daftar_tahun'));
}


    /**
     * Form tambah kelas
     */
    public function create()
    {
        $guru = GuruDanStaff::orderBy('nama')->get();

        // --- Otomatis isi tahun ajar sekarang ---
        $tahunSekarang = date('Y');
        $tahunDepan = $tahunSekarang + 1;

        // Jika sekarang bulan Juli ke atas, berarti sudah masuk tahun ajar baru
        if (date('n') >= 7) {
            $tahunAjar = $tahunSekarang . '/' . $tahunDepan;
        } else {
            $tahunAjar = ($tahunSekarang - 1) . '/' . $tahunSekarang;
        }

        return view('kelas.create', compact('guru', 'tahunAjar'));
    }

    /**
     * Simpan data kelas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:guru_dan_staff,id',
            'tahun_ajar' => 'nullable|regex:/^\d{4}\/\d{4}$/',
            'mata_pelajaran' => 'nullable|string',
        ]);

        $tahunAjar = $request->tahun_ajar;
        if (empty($tahunAjar)) {
            $tahunSekarang = date('Y');
            $tahunDepan = $tahunSekarang + 1;
            $tahunAjar = (date('n') >= 7)
                ? "$tahunSekarang/$tahunDepan"
                : ($tahunSekarang - 1) . "/$tahunSekarang";
        }
        $mataPelajaran = $request->mata_pelajaran
            ? json_decode($request->mata_pelajaran, true)
            : [];
        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
            'tahun_ajar' => $tahunAjar,
            'mata_pelajaran' =>$mataPelajaran,
        ]);

        return redirect()->route('kelas.index')->with('success_add', 'Kelas berhasil ditambahkan.');
    }


    /**
     * Form edit kelas
     */
    public function edit($id)
    {
        $kelas = Kelas::findOrFail($id);
        $guru = GuruDanStaff::orderBy('nama')->get();
        return view('kelas.edit', compact('kelas', 'guru'));
    }

    /**
     * Update data kelas
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:255',
            'guru_id' => 'nullable|exists:guru_dan_staff,id',
            'tahun_ajar' => [
                'required',
                'regex:/^\d{4}\/\d{4}$/',
            ],
              'mata_pelajaran' => 'nullable|string', 
        ]);

        $kelas = Kelas::findOrFail($id);
         $mataPelajaran = $request->mata_pelajaran
        ? json_decode($request->mata_pelajaran, true)
        : [];
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
            'tahun_ajar' => $request->tahun_ajar,
             'mata_pelajaran' => $mataPelajaran,
        ]);

        return redirect()->route('kelas.index')->with('success_update', 'Data kelas berhasil diperbarui.');
    }

    /**
     * Hapus data kelas
     */
    public function destroy($id)
    {
        $kelas = Kelas::findOrFail($id);
        $kelas->delete();

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil dihapus.');
    }
}
