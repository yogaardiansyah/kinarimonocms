<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo')->nullable();
            $table->text('description')->nullable();
            $table->string('status')->default('available');
            $table->date('purchase_date')->nullable();
            
            // Menggunakan foreignId yang menunjuk ke tabel 'asset_categories'
            $table->foreignId('asset_category_id')->constrained('asset_categories')->cascadeOnDelete();
            
            // Menggunakan foreignId yang menunjuk ke tabel 'users' untuk penanggung jawab
            $table->foreignId('user_id')->comment('Penanggung Jawab')->constrained('users')->cascadeOnDelete();
            
            // Kolom JSON untuk spesifikasi dinamis
            $table->json('specifications')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assets');
    }
};