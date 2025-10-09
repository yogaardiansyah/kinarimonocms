// File: database/migrations/YYYY_MM_DD_HHMMSS_create_galleries_table.php
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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('image'); // Path file gambar
            $table->string('title'); // Judul gambar
            $table->string('event')->nullable(); // Nama event (opsional)
            $table->boolean('is_published')->default(false); // Status publikasi
            $table->integer('order_column')->nullable(); // Kolom untuk sorting
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};