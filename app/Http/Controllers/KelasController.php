<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\GuruDanStaff;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    /**
     * Tampilkan semua data kelas
     */
    public function index()
    {
        $kelas = Kelas::with('guru')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        $guru = GuruDanStaff::where('jabatan', 'Guru')->get(); // ambil guru

        return view('kelas.index', compact('kelas', 'guru'));
    }

    /**
     * Tampilkan form tambah kelas
     */
    public function create()
    {
        // Ambil semua guru untuk dropdown
        $guru = GuruDanStaff::orderBy('nama')->get();
        return view('kelas.create', compact('guru'));
    }

    /**
     * Simpan data kelas baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|string|max:100',
            'guru_id' => 'required|exists:guru_dan_staff,id',

        ]);

        Kelas::create($request->all());

        return redirect()->route('kelas.index')->with('success', 'Data kelas berhasil ditambahkan.');
    }

    /**
     * Tampilkan form edit kelas
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
            'nama_kelas' => 'required|string|max:100',
            'guru_id' => 'required|exists:guru_dan_staff,id',

        ]);

        $kelas = Kelas::findOrFail($id);
        $kelas->update($request->all());

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
