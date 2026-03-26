<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('awig_files', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->text('deskripsi')->nullable();
            $table->string('file_path');
            $table->date('tanggal_upload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('awig_files');
    }
};
