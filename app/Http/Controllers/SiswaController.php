<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Kelas;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::with('kelas')->orderBy('nama_siswa');

        // Filter berdasarkan search
        if ($request->filled('search')) {
            $query->where('nama_siswa', 'like', '%' . $request->search . '%');
        }

        // Filter Tahun Ajar
        if ($request->filled('tahun_ajar')) {
            $query->where('tahun_ajar', $request->tahun_ajar);
        }

        // Filter Kelas
        if ($request->filled('kelas_id')) {
            $query->where('kelas_id', $request->kelas_id);
        }

        $siswa = $query->paginate(10);
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $tahunAjarList = Kelas::select('tahun_ajar')->distinct()->pluck('tahun_ajar');

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
            'orangtua_perempuan' => 'required|string|max:255',
            'orangtua_laki_laki' => 'required|string|max:255',
            'alamat' => 'required|string|max:200',
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

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil ditambahkan.');
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
            'orangtua_perempuan' => 'required|string|max:255',
            'orangtua_laki_laki' => 'required|string|max:255',
            'alamat' => 'required|string|max:200',
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

        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diperbarui.');
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
