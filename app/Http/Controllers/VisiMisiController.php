<?php

namespace App\Http\Controllers;

use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log; 

class VisiMisiController extends Controller
{
    public function index()
    {
        $visimisi = VisiMisi::all();
        return view('visi_misi.index', compact('visimisi'));
    }

    public function create()
    {
        return view('visi_misi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_sekolah' => 'required',
            'visi' => 'required',
            'misi' => 'required',
            'akreditasi' => 'required',
        ]);

        VisiMisi::create($request->all());

        return redirect()->route('visi-misi.index')->with('success_add', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        return view('visi_misi.edit', compact('visimisi'));
    }

    public function update(Request $request, $id)
    {
        // 1. Validasi Data
        $validatedData = $request->validate([
            'nama_sekolah' => 'required|string|max:255',
            'visi' => 'required|string',
            'misi' => 'required|string', 
            'akreditasi' => 'required|string|max:10',
        ]);

        // 2. Cari Data
        $visimisi = VisiMisi::findOrFail($id);

        // $dataToUpdate sudah berisi data yang sudah divalidasi
        $dataToUpdate = $validatedData;

        // 3. Proses Update
        try {
            $visimisi->update($dataToUpdate);

            // Sukses: Halaman pasti berpindah ke index
            return redirect()->route('visi-misi.index')->with('success_update', 'Data Visi Misi berhasil diperbarui!');
        } catch (\Illuminate\Database\Eloquent\MassAssignmentException $e) {
            
            Log::error("Mass Assignment Error: " . $e->getMessage()); 
            return back()->with('error', 'Gagal update: Terjadi masalah Mass Assignment. Pastikan semua field (nama_sekolah, visi, misi, akreditasi) ada di $fillable Model VisiMisi.')->withInput();
        } catch (\Exception $e) {

            Log::error("Update Visi Misi Gagal: " . $e->getMessage()); 
            return back()->with('error', 'Gagal memperbarui data. Silakan coba lagi atau cek log server.')->withInput();
        }
    }

    public function destroy($id)
    {
        $visimisi = VisiMisi::findOrFail($id);
        $visimisi->delete();

        return redirect()->route('visi-misi.index')->with('success', 'Data berhasil dihapus');
    }
}
