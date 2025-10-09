<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('id_member')->unique(); // ID Member Unik (e.g., KMM-202401-ABCD)
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade'); // Relasi ke tabel roles
            $table->string('photo')->nullable();
            $table->string('name');
            $table->text('address')->nullable();
            $table->json('social_media')->nullable();
            $table->date('joined_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};