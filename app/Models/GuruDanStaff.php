<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GuruDanStaff extends Model
{
    protected $table = 'guru_dan_staff';
    protected $primaryKey = 'id';

    protected $fillable = [
        'foto',
        'no_urut',
        'nama',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'no_karpeg',
        'nuptk',
        'npwp',
        'pangkat_golongan',
        'sk_nomor',
        'sk_tanggal',
        'sk_tmt',
        'angka_kredit',
        'masa_kerja_tahun',
        'masa_kerja_bulan',
        'jabatan',
        'pendidikan_terakhir',
        'tmt_kgb_terakhir',
        'sertifikasi',
        'ket',
        'tmt_bertugas',
        'alamat'
    ];




}
