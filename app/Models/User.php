<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'alamat',
        'telepon',
        'profile_photo_path',

        // 🔽 tambahan
        'role',
        'kelas_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relasi ke kelas (khusus orang tua)
     */
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    /**
     * Akses URL foto profil.
     */
    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo_path && Storage::disk('public')->exists($this->profile_photo_path)) {
            return asset('storage/' . $this->profile_photo_path);
        }

        return 'https://via.placeholder.com/150';
    }

    /**
     * Helper role (opsional tapi enak dipakai)
     */
    public function isOrangTua(): bool
    {
        return $this->role === 'orangtua';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
