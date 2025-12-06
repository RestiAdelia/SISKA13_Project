<?php

namespace App\Http\Controllers;

use App\Models\Mou;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class MouController extends Controller
{
   
    public function index()
    {
        $data = Mou::latest()->get();
        return view('mou.index', compact('data'));
    }

    public function create()
    {
        return view('mou.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul_mou' => 'required',
            'jenis_kerjasama' => 'required',
            'nama_instansi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5000'
        ]);

        
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('mou', 'public');
        }
        // Hitung jangka waktu otomatis
        $jangka_waktu = $this->hitungJangkaWaktu($request->tanggal_mulai, $request->tanggal_berakhir);

        // Tentukan status otomatis
        $status = $this->tentukanStatus($request->tanggal_mulai, $request->tanggal_berakhir);

        Mou::create([
            'judul_mou' => $request->judul_mou,
            'jenis_kerjasama' => $request->jenis_kerjasama,
            'nama_instansi' => $request->nama_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'jangka_waktu' => $jangka_waktu,
            'status' => $status,
            'file' => $filePath,
        ]);

        return redirect()->route('mou.index')->with('success_add', 'MoU berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $mou = Mou::findOrFail($id);
        return view('mou.edit', compact('mou'));
    }

   
    public function update(Request $request, $id)
    {
        $request->validate([
            'judul_mou' => 'required',
            'jenis_kerjasama' => 'required',
            'nama_instansi' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_berakhir' => 'required|date|after_or_equal:tanggal_mulai',
            'file' => 'nullable|mimes:pdf,doc,docx|max:5000'
        ]);

        $mou = Mou::findOrFail($id);

        // Upload file baru
        if ($request->hasFile('file')) {
            if ($mou->file && Storage::disk('public')->exists($mou->file)) {
                Storage::disk('public')->delete($mou->file);
            }

            $filePath = $request->file('file')->store('mou', 'public');
        } else {
            $filePath = $mou->file;
        }

        // Hitung ulang jangka waktu otomatis
        $jangka_waktu = $this->hitungJangkaWaktu($request->tanggal_mulai, $request->tanggal_berakhir);

        // Tentukan ulang status otomatis
        $status = $this->tentukanStatus($request->tanggal_mulai, $request->tanggal_berakhir);

        $mou->update([
            'judul_mou' => $request->judul_mou,
            'jenis_kerjasama' => $request->jenis_kerjasama,
            'nama_instansi' => $request->nama_instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_berakhir' => $request->tanggal_berakhir,
            'jangka_waktu' => $jangka_waktu,
            'status' => $status,
            'file' => $filePath,
        ]);

        return redirect()->route('mou.index')->with('success_update', 'MoU berhasil diperbarui.');
    }

  
    public function destroy($id)
    {
        $mou = Mou::findOrFail($id);

        if ($mou->file && Storage::disk('public')->exists($mou->file)) {
            Storage::disk('public')->delete($mou->file);
        }

        $mou->delete();

        return redirect()->route('mou.index')->with('success', 'MoU berhasil dihapus.');
    }

    // ================================
    // DOWNLOAD FILE
    // ================================
    // public function download($id)
    // {
    //     $mou = Mou::findOrFail($id);

    //     if (!$mou->file || !Storage::disk('public')->exists($mou->file)) {
    //         return back()->with('error', 'File tidak ditemukan');
    //     }

    //     return Storage::disk('public')->download($mou->file);
    // }


    // ================================
    // FUNGSI MEMBANTU
    // ================================
    private function hitungJangkaWaktu($mulai, $akhir)
    {
        $start = Carbon::parse($mulai);
        $end = Carbon::parse($akhir);

        $years = $start->diffInYears($end);
        $months = $start->diffInMonths($end) % 12;

        $jangka = "";
        if ($years > 0) $jangka .= $years . " Tahun ";
        if ($months > 0) $jangka .= $months . " Bulan";

        return trim($jangka);
    }

    private function tentukanStatus($mulai, $akhir)
    {
        $start = Carbon::parse($mulai);
        $end = Carbon::parse($akhir);
        $now = now();

        if ($now->lt($start)) {
            return "Belum Dimulai";
        } elseif ($now->between($start, $end)) {
            return "Aktif";
        } elseif ($now->gt($end)) {
            return "Selesai";
        }

        return "Tidak Diketahui";
    }
}
