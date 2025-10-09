<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AssetCategory extends Model
{
    use HasFactory;

    /**
     * Menentukan nama tabel secara eksplisit agar sesuai dengan migrasi.
     */
    protected $table = 'asset_categories';

    protected $fillable = ['name'];

    public function assets(): HasMany
    {
        // Relasi ke model Asset
        return $this->hasMany(Asset::class, 'asset_category_id');
    }
}