<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('financial_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            // Tipe kategori: Pemasukan atau Pengeluaran
            $table->enum('type', ['income', 'expense']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_categories');
    }
};