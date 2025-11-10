<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
      protected $table = 'siswa';
     protected $fillable = [
        'nama_siswa',
        'nipd',
        'nisn',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'orangtua_perempuan',
        'orangtua_laki_laki',
        'alamat',
        'kelas_id',
        'tahun_ajar',
    ];

       public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
