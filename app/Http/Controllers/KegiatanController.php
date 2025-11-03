<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KegiatanController extends Controller
{
    /**
     * Menampilkan daftar semua kegiatan.
     */
    public function index()
    {
        $kegiatan = Kegiatan::latest()->paginate(5); 
        return view('kegiatan.index', compact('kegiatan'));
    }


    /**
     * Form tambah kegiatan.
     */
    public function create()
    {
        return view('kegiatan.create');
    }

    /**
     * Simpan kegiatan baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar_kegiatan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar_kegiatan')) {
            $gambarPath = $request->file('gambar_kegiatan')->store('kegiatan', 'public');
        }

        Kegiatan::create([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'deskripsi' => $request->deskripsi,
            'gambar_kegiatan' => $gambarPath,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Form edit kegiatan.
     */
    public function edit(Kegiatan $kegiatan)
    {
        return view('kegiatan.edit', compact('kegiatan'));
    }

    /**
     * Update data kegiatan.
     */
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $request->validate([
            'nama_kegiatan' => 'required|string|max:255',
            'tanggal_kegiatan' => 'required|date',
            'deskripsi' => 'required|string',
            'gambar_kegiatan' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $gambarPath = $kegiatan->gambar_kegiatan;

        if ($request->hasFile('gambar_kegiatan')) {
            if ($gambarPath) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar_kegiatan')->store('kegiatan', 'public');
        }

        $kegiatan->update([
            'nama_kegiatan' => $request->nama_kegiatan,
            'tanggal_kegiatan' => $request->tanggal_kegiatan,
            'deskripsi' => $request->deskripsi,
            'gambar_kegiatan' => $gambarPath,
        ]);

        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil diperbarui!');
    }

    /**
     * Hapus kegiatan.
     */
    public function destroy(Kegiatan $kegiatan)
    {
        if ($kegiatan->gambar_kegiatan) {
            Storage::disk('public')->delete($kegiatan->gambar_kegiatan);
        }

        $kegiatan->delete();
        return redirect()->route('kegiatan.index')->with('success', 'Kegiatan berhasil dihapus!');
    }

    public function show($id)
    {
        $kegiatan = Kegiatan::findOrFail($id);
        return view('kegiatan.show', compact('kegiatan'));
    }
}
