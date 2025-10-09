<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Spatie\Permission\Models\Role; // <-- PENTING: Import model Role

class Sop extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'role_id',
    ];

    /**
     * Mendefinisikan relasi bahwa setiap SOP dimiliki oleh satu Role (Divisi).
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class);
    }
}