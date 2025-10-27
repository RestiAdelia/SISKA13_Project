<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'kegiatan';

    // Kolom yang bisa diisi (mass assignable)
    protected $fillable = [
        'nama_kegiatan',
        'tanggal_kegiatan',
        'gambar_kegiatan',
        'deskripsi',
    ];
}
