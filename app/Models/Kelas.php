<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;

    protected $table = 'kelas';
    protected $fillable = ['nama_kelas', 'nama_kelas', 'tahun_ajar', 'guru_id', 'mata_pelajaran'];
    protected $casts = [
        'mata_pelajaran' => 'array',
    ];


    public function guru()
    {
        return $this->belongsTo(GuruDanStaff::class, 'guru_id');
    }
}
