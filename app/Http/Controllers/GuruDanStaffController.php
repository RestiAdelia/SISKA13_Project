<?php

namespace App\Http\Controllers;

use App\Models\GuruDanStaff;
use Illuminate\Http\Request;

class GuruDanStaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $data = GuruDanStaff::all();
        return view('guru_dan_staff.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guru_dan_staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'no_urut' => 'nullable|integer',
            'nama' => 'required|string|max:100',
            'nip' => 'nullable|string|max:30|unique:guru_dan_staff,nip',
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'no_karpeg' => 'nullable|string|max:30',
            'nuptk' => 'nullable|string|max:30',
            'npwp' => 'nullable|string|max:30',
            'pangkat_golongan' => 'nullable|string|max:50',
            'sk_nomor' => 'nullable|string|max:100',
            'sk_tanggal' => 'nullable|date',
            'sk_tmt' => 'nullable|date',
            'angka_kredit' => 'nullable|numeric',
            'masa_kerja_tahun' => 'nullable|integer',
            'masa_kerja_bulan' => 'nullable|integer',
            'jabatan' => 'nullable|string|max:100',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'tmt_kgb_terakhir' => 'nullable|date',
            'sertifikasi' => 'nullable|in:Sudah,Belum',
            'ket' => 'nullable|string|max:255',
            'tmt_bertugas' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validatedData['foto'] = $filename;
        }

        GuruDanStaff::create($validatedData);

        return redirect()->route('guru_dan_staff.index')->with('success_add', 'Data guru dan staff berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(GuruDanStaff $guruDanStaff) {
        return view('guru_dan_staff.show', compact('guruDanStaff'));
    }


    public function edit(GuruDanStaff $guruDanStaff)
    {
        return view('guru_dan_staff.edit', compact('guruDanStaff'),
            ['item' => $guruDanStaff]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, GuruDanStaff $guruDanStaff)
    {
        $validatedData = $request->validate([
            'foto' => 'nullable|image|max:2048',
            'no_urut' => 'nullable|integer',
            'nama' => 'required|string|max:100',
            'nip' => 'nullable|string|max:30|unique:guru_dan_staff,nip,' . $guruDanStaff->id,
            'tempat_lahir' => 'nullable|string|max:50',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'nullable|in:L,P',
            'no_karpeg' => 'nullable|string|max:30',
            'nuptk' => 'nullable|string|max:30',
            'npwp' => 'nullable|string|max:30',
            'pangkat_golongan' => 'nullable|string|max:50',
            'sk_nomor' => 'nullable|string|max:100',
            'sk_tanggal' => 'nullable|date',
            'sk_tmt' => 'nullable|date',
            'angka_kredit' => 'nullable|numeric',
            'masa_kerja_tahun' => 'nullable|integer',
            'masa_kerja_bulan' => 'nullable|integer',
            'jabatan' => 'nullable|string|max:100',
            'pendidikan_terakhir' => 'nullable|string|max:50',
            'tmt_kgb_terakhir' => 'nullable|date',
            'sertifikasi' => 'nullable|in:Sudah,Belum',
            'ket' => 'nullable|string|max:255',
            'tmt_bertugas' => 'nullable|date',
            'alamat' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($guruDanStaff->foto && file_exists(public_path('uploads/' . $guruDanStaff->foto))) {
                unlink(public_path('uploads/' . $guruDanStaff->foto));
            }
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $filename);
            $validatedData['foto'] = $filename;
        }

        $guruDanStaff->update($validatedData);

        return redirect()->route('guru_dan_staff.index')->with('success_update', 'Data guru dan staff berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(GuruDanStaff $guruDanStaff)
    {
        // Hapus foto jika ada
        if ($guruDanStaff->foto && file_exists(public_path('uploads/' . $guruDanStaff->foto))) {
            unlink(public_path('uploads/' . $guruDanStaff->foto));
        }

        $guruDanStaff->delete();

        return redirect()->route('guru_dan_staff.index')->with('success', 'Data guru dan staff berhasil dihapus.');
    }
}
