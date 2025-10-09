<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Asset extends Model
{
    use HasFactory;

    /**
     * Tidak perlu mendefinisikan nama tabel karena Laravel akan menebak 'assets' dengan benar.
     * Tapi untuk konsistensi, bisa ditambahkan: protected $table = 'assets';
     */

    protected $fillable = [
        'name',
        'photo',
        'description',
        'status',
        'purchase_date',
        'asset_category_id', // Pastikan foreign key ada di fillable
        'user_id',
        'specifications',
    ];

    /**
     * Casts untuk memastikan Eloquent memperlakukan kolom ini dengan benar.
     */
    protected $casts = [
        'specifications' => 'array',
        'purchase_date' => 'date',
    ];

    /**
     * Mendefinisikan relasi ke AssetCategory.
     * Nama method 'assetCategory' lebih jelas daripada 'category'.
     */
    public function assetCategory(): BelongsTo
    {
        return $this->belongsTo(AssetCategory::class, 'asset_category_id');
    }

    /**
     * Relasi ke User sebagai penanggung jawab.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}