<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sops', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('content'); // Menggunakan longText untuk konten SOP yang panjang
            
            // KUNCI UTAMA: Relasi ke tabel 'roles'
            $table->foreignId('role_id')->comment('Divisi/Role yang memiliki SOP ini')->constrained('roles')->cascadeOnDelete();
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('sops');
    }
};