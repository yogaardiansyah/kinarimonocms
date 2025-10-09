<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_community_applications_table.php
    public function up(): void
    {
        Schema::create('community_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instagram');
            $table->text('reason');
            // Status ini adalah kuncinya: pending, approved, rejected
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

};
