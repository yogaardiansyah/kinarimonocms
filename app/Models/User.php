<?php

namespace App\Models;

use Filament\Models\Contracts\HasAvatar; // 1. Pastikan interface di-import
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

// 2. Implementasikan interface HasAvatar di sini
class User extends Authenticatable implements HasAvatar
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_url', // 3. TAMBAHKAN 'avatar_url' DI SINI (INI YANG PALING PENTING)
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<string, int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Metode untuk mendapatkan URL avatar yang akan ditampilkan di panel Filament.
     */
    public function getFilamentAvatarUrl(): ?string
    {
        // 4. Pastikan menggunakan 'avatar_url' sesuai dengan nama kolom di database
        return $this->avatar_url ? Storage::url($this->avatar_url) : null;
    }
}