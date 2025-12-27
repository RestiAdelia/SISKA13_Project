<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TugasController extends Controller
{
    /** INDEX */
    public function index(Request $request)
{
    $user = Auth::user();

    // List kelas (untuk dropdown admin)
    $kelasList = Kelas::all();

    $query = Tugas::with('kelas')
        ->where('deadline', '>=', now());

    // 🔒 JIKA ORANG TUA → KUNCI KE KELAS LOGIN
    if ($user->role === 'orangtua') {
        $query->where('kelas_id', $user->kelas_id);
    }

    // 🔎 Pencarian judul
    if ($request->search) {
        $query->where('judul', 'like', '%' . $request->search . '%');
    }

    // 🏫 Filter kelas (HANYA ADMIN)
    if ($user->role === 'admin' && $request->kelas_id) {
        $query->where('kelas_id', $request->kelas_id);
    }

    // 📚 Filter mapel
    if ($request->mapel) {
        $query->where('mata_pelajaran', $request->mapel);
    }

    $tugas = $query->paginate(10);

    // Dropdown kelas
    if ($user->role === 'admin') {
        $daftar_kelas = Kelas::orderBy('nama_kelas')->get();
    } else {
        // orang tua → hanya kelasnya sendiri
        $daftar_kelas = Kelas::where('id', $user->kelas_id)->get();
    }

    $daftar_mapel = Tugas::select('mata_pelajaran')
        ->when($user->role === 'orangtua', function ($q) use ($user) {
            $q->where('kelas_id', $user->kelas_id);
        })
        ->distinct()
        ->pluck('mata_pelajaran');

    return view('tugas.index', compact(
        'tugas',
        'daftar_kelas',
        'daftar_mapel',
        'kelasList'
    ));
}

    // public function index(Request $request)
    // {
    //     $kelasList = Kelas::all();
    //     $query = Tugas::with('kelas')
    //         ->where('deadline', '>=', now());
    //     // Pencarian berdasarkan judul
    //     if ($request->search) {
    //         $query->where('judul', 'like', '%' . $request->search . '%');
    //     }

    //     // Filter kelas
    //     if ($request->kelas_id) {
    //         $query->where('kelas_id', $request->kelas_id);
    //     }

    //     // Filter mapel
    //     if ($request->mapel) {
    //         $query->where('mata_pelajaran', $request->mapel);
    //     }

    //     $tugas = $query->paginate(10);
    //     $daftar_kelas = Kelas::orderBy('nama_kelas')->get();
    //     $daftar_mapel = Kelas::select('mata_pelajaran')->distinct()->pluck('mata_pelajaran');

    //     return view('tugas.index', compact('tugas', 'daftar_kelas', 'daftar_mapel', 'kelasList'));
    // }

    /** CREATE */
    public function create()
    {
        $kelas = Kelas::orderBy('nama_kelas')->get();
        return view('tugas.create', compact('kelas'));
    }

    /** STORE */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'deadline' => 'required|date',
            'file_lampiran' => 'nullable|file|max:3072'
        ]);

        // Ambil data kelas
        $kelas = Kelas::findOrFail($request->kelas_id);

        // Ambil mata pelajaran dari request
        $mapel = $request->mata_pelajaran;

        // Jika mapel berupa array → jadikan string
        if (is_array($mapel)) {
            $mapel = implode(', ', $mapel);
        }

        // Upload file
        $file = null;
        if ($request->hasFile('file_lampiran')) {
            $file = $request->file('file_lampiran')->store('lampiran_tugas', 'public');
        }

        // Simpan ke database
        Tugas::create([
            'judul'         => $request->judul,
            'deskripsi'     => $request->deskripsi,
            'kelas_id'      => $request->kelas_id,
            'mata_pelajaran' => $mapel,
            'deadline'      => $request->deadline,
            'file_lampiran' => $file
        ]);

        return redirect()->route('tugas.index')->with('success_add', 'Tugas berhasil ditambahkan.');
    }


    /** SHOW */
    public function show($id)
    {
        $tugas = Tugas::with('kelas')->findOrFail($id);
        return view('tugas.show', compact('tugas'));
    }

    /** EDIT */
    public function edit($id)
    {
        $tugas = Tugas::findOrFail($id);
        $kelas = Kelas::orderBy('nama_kelas')->get();

        return view('tugas.edit', compact('tugas', 'kelas'));
    }

    /** UPDATE */
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'kelas_id' => 'required|exists:kelas,id',
            'deadline' => 'required|date',
            'file_lampiran' => 'nullable|file|max:3072'
        ]);

        $tugas = Tugas::findOrFail($id);

        // Ambil mata pelajaran dari input
        $mapel = $request->mata_pelajaran;
        if (is_array($mapel)) {
            $mapel = implode(', ', $mapel);
        }

        // Upload file baru
        if ($request->hasFile('file_lampiran')) {

            // Hapus file lama jika ada
            if ($tugas->file_lampiran && file_exists(storage_path("app/public/" . $tugas->file_lampiran))) {
                unlink(storage_path("app/public/" . $tugas->file_lampiran));
            }

            $file = $request->file('file_lampiran')->store('lampiran_tugas', 'public');
        } else {
            $file = $tugas->file_lampiran;
        }

        // Update data tugas
        $tugas->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran' => $mapel,
            'deadline' => $request->deadline,
            'file_lampiran' => $file
        ]);

        return redirect()->route('tugas.index')->with('success_update', 'Tugas berhasil diperbarui.');
    }


    /** DELETE */
    public function destroy($id)
    {
        $tugas = Tugas::findOrFail($id);

        if ($tugas->file_lampisan && file_exists(storage_path("app/public/" . $tugas->file_lampiran))) {
            unlink(storage_path("app/public/" . $tugas->file_lampiran));
        }

        $tugas->delete();

        return redirect()->route('tugas.index')->with('success', 'Tugas berhasil dihapus.');
    }
}
