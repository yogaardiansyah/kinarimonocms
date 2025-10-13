<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('posters', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image_path');
            $table->string('author')->nullable();
            $table->string('source')->nullable();
            $table->string('category')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('posters'); }
};