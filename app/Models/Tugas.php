<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
     use HasFactory;

    protected $table = 'tugas';

    protected $fillable = [
        'judul',
        'deskripsi',
        'kelas_id',
        'mata_pelajaran',
        'deadline',
        'file_lampiran'
    ];

    public function kelas()
    {
        return $this->belongsTo(kelas::class);
    }
}
