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
    $query = Kelas::with('guru')->orderBy('tahun_ajar', 'desc');

    // Filter berdasarkan tahun ajar
    if ($request->filled('tahun_ajar')) {
        $query->where('tahun_ajar', $request->tahun_ajar);
    }

    // Pencarian nama kelas atau guru
    if ($request->filled('search')) {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nama_kelas', 'like', "%$search%")
              ->orWhereHas('guru', function($guruQuery) use ($search) {
                  $guruQuery->where('nama', 'like', "%$search%");
              });
        });
    }

    $kelas = $query->paginate(10);

    // Ambil daftar tahun ajar unik untuk filter dropdown
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
    ]);

    $tahunAjar = $request->tahun_ajar;
    if (empty($tahunAjar)) {
        $tahunSekarang = date('Y');
        $tahunDepan = $tahunSekarang + 1;
        $tahunAjar = (date('n') >= 7)
            ? "$tahunSekarang/$tahunDepan"
            : ($tahunSekarang - 1) . "/$tahunSekarang";
    }

    Kelas::create([
        'nama_kelas' => $request->nama_kelas,
        'guru_id' => $request->guru_id,
        'tahun_ajar' => $tahunAjar,
    ]);

    return redirect()->route('kelas.index')->with('success', 'Kelas berhasil ditambahkan.');
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
        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'guru_id' => $request->guru_id,
            'tahun_ajar' => $request->tahun_ajar,
        ]);

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil diperbarui.');
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
