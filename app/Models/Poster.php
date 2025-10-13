<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poster extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'transform_data', // <-- TAMBAHKAN INI
        'author',
        'source',
        'category',
    ];

    /**
     * Beri tahu Laravel untuk otomatis mengubah JSON dari database menjadi array PHP.
     */
    protected $casts = [
        'transform_data' => 'array', // <-- TAMBAHKAN INI
    ];
}