<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();

        $query = Siswa::with('kelas')
            ->leftJoin('kelas', 'siswa.kelas_id', '=', 'kelas.id')
            ->orderByRaw(
                'CAST(REGEXP_REPLACE(LOWER(kelas.nama_kelas), "[^0-9]", "") AS UNSIGNED) ASC'
            )
            ->select('siswa.*');

        // 🔒 Kunci kelas untuk orang tua
        if ($user->role === 'orangtua') {
            $query->where('siswa.kelas_id', $user->kelas_id);
        }

        // 🔎 Search
        if ($request->filled('search')) {
            $query->where('siswa.nama_siswa', 'like', '%' . $request->search . '%');
        }

        // 📆 Tahun ajar (DEFAULT dari DB)
        $tahunAjarList = Siswa::select('tahun_ajar')
            ->distinct()
            ->orderBy('tahun_ajar', 'desc')
            ->pluck('tahun_ajar');

        $tahunAjarDefault = $tahunAjarList->first();

        $query->where(
            'siswa.tahun_ajar',
            $request->input('tahun_ajar', $tahunAjarDefault)
        );

        // 🏫 Filter kelas (ADMIN saja)
        if ($user->role === 'admin' && $request->filled('kelas_id')) {
            $query->where('siswa.kelas_id', $request->kelas_id);
        }

        $siswa = $query->paginate(10);

        // 📦 Dropdown kelas
        if ($user->role === 'admin') {
            $kelas = Kelas::orderByRaw(
                'CAST(REGEXP_REPLACE(LOWER(nama_kelas), "[^0-9]", "") AS UNSIGNED) ASC'
            )->get();
        } else {
            $kelas = Kelas::where('id', $user->kelas_id)->get();
        }

        return view('siswa.index', compact('siswa', 'kelas', 'tahunAjarList'));
    }


    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $tahunAjarList = Kelas::select('tahun_ajar')->distinct()->pluck('tahun_ajar');
        return view('siswa.create', compact('kelas', 'tahunAjarList'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nipd' => 'required|numeric|digits_between:1,50|unique:siswa,nipd',
            'nisn' => 'required|numeric|digits_between:1,50|unique:siswa,nisn',
            'jenis_kelamin' => 'required|in:L,P',
            'orangtua_perempuan' => 'nullable|string|max:255',
            'orangtua_laki_laki' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:200',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar' => 'required|string',
        ]);

        $jenis_kelamin = $request->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';

        Siswa::create([
            'nama_siswa' => $request->nama_siswa,
            'nipd' => $request->nipd,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'orangtua_perempuan' => $request->orangtua_perempuan,
            'orangtua_laki_laki' => $request->orangtua_laki_laki,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'tahun_ajar' => $request->tahun_ajar,
        ]);

        return redirect()->route('siswa.index')->with('success_add', 'Data siswa berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $siswa = Siswa::findOrFail($id);
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $tahunAjarList = Kelas::select('tahun_ajar')->distinct()->pluck('tahun_ajar');
        return view('siswa.edit', compact('siswa', 'kelas', 'tahunAjarList'));
    }

    public function update(Request $request, $id)
    {
        $siswa = Siswa::findOrFail($id);

        $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nipd' => 'required|numeric|digits_between:1,50|unique:siswa,nipd,' . $id,
            'nisn' => 'required|numeric|digits_between:1,50|unique:siswa,nisn,' . $id,
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'orangtua_perempuan' => 'nullable|string|max:255',
            'orangtua_laki_laki' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:200',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajar' => 'required|string',
        ]);

        $jenis_kelamin = $request->jenis_kelamin === 'L' ? 'Laki-laki' : 'Perempuan';

        $siswa->update([
            'nama_siswa' => $request->nama_siswa,
            'nipd' => $request->nipd,
            'nisn' => $request->nisn,
            'jenis_kelamin' => $jenis_kelamin,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'orangtua_perempuan' => $request->orangtua_perempuan,
            'orangtua_laki_laki' => $request->orangtua_laki_laki,
            'alamat' => $request->alamat,
            'kelas_id' => $request->kelas_id,
            'tahun_ajar' => $request->tahun_ajar,
        ]);

        return redirect()->route('siswa.index')->with('success_update', 'Data siswa berhasil diperbarui.');
    }

    public function destroy($id)
    {

        $siswa = Siswa::findOrFail($id);
        $siswa->delete();

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function show($id)
    {

        $siswa = Siswa::with('kelas')->findOrFail($id);
        return view('siswa.show', compact('siswa'));
    }
}
