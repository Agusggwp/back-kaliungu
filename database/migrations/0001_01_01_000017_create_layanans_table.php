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
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // id: "posyandu"
            $table->string('nama'); // title: "Posyandu"
            $table->string('category')->nullable(); // Kesehatan, Keamanan, Pendidikan, etc
            $table->string('subtitle')->nullable(); // Subtitle
            $table->text('short_description')->nullable(); // Short description
            $table->longText('deskripsi')->nullable(); // Full description
            $table->string('image')->nullable(); // Image path
            $table->text('jadwal')->nullable(); // Schedule
            $table->text('lokasi')->nullable(); // Location
            $table->string('telepon')->nullable(); // Contact phone
            $table->string('email')->nullable(); // Email
            $table->json('services')->nullable(); // Array of services
            $table->json('requirements')->nullable(); // Array of requirements
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
