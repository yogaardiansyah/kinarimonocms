<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('financial_transactions', function (Blueprint $table) {
            $table->id();
            // Tipe transaksi: Pemasukan atau Pengeluaran
            $table->enum('type', ['income', 'expense']);
            // Gunakan decimal untuk uang agar presisi
            $table->decimal('amount', 15, 2);
            $table->text('description');
            $table->date('transaction_date');
            $table->string('receipt_path')->nullable(); // Untuk upload bukti/nota
            
            $table->foreignId('financial_category_id')->constrained('financial_categories')->cascadeOnDelete();
            $table->foreignId('user_id')->comment('User yang mencatat')->constrained('users');
            
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('financial_transactions');
    }
};