<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommunityApplication extends Model
{
    use HasFactory;

    protected $table = 'community_applications';

    protected $fillable = [
        'name',
        'instagram',
        'reason',
        'status', // Pastikan status bisa diisi
    ];
}