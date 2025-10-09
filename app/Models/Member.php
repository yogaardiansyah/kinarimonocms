<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_member',
        'role_id', // Menggantikan 'division'
        'photo',
        'name',
        'address',
        'social_media',
        'joined_at',
    ];

    protected $casts = [
        'social_media' => 'array',
        'joined_at' => 'date',
    ];

    /**
     * Boot method untuk model.
     * Akan dijalankan saat event model terjadi.
     */
    protected static function booted(): void
    {
        // Event 'creating' akan dijalankan sebelum record baru disimpan ke database
        static::creating(function (Member $member) {
            // Generate ID Member unik jika belum ada
            if (empty($member->id_member)) {
                $prefix = 'KNM-MBR';
                $date = date('Ym');
                $random = strtoupper(Str::random(4));
                $member->id_member = "{$prefix}-{$date}-{$random}";
            }
        });
    }

    /**
     * Mendefinisikan relasi bahwa Member "milik" satu Role (Divisi).
     */
    public function divisionRole(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}