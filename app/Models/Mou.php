<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mou extends Model
{
    use HasFactory;

    protected $table = 'mou';

    protected $fillable = [
        'judul_mou',
        'jenis_kerjasama',
        'nama_instansi',
        'tanggal_mulai',
        'tanggal_berakhir',
        'jangka_waktu',
        'status',
        'file',
    ];

    protected $casts = [
        'tanggal_mulai' => 'date',
        'tanggal_berakhir' => 'date',
    ];
}
