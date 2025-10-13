<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->json('transform_data')->nullable()->after('image_path');
        });
    }

    public function down(): void
    {
        Schema::table('posters', function (Blueprint $table) {
            $table->dropColumn('transform_data');
        });
    }
};