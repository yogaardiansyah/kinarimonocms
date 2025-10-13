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
        Schema::create('media_partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nama_acara');
            $table->date('tanggal');
            $table->string('lokasi');
            $table->string('link');
            $table->string('media_partner');
            $table->text('artikel')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_partnerships');
    }
};