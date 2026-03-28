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
        Schema::table('penduduk_banjar', function (Blueprint $table) {
            // Drop existing columns
            $table->dropColumn(['nama', 'nik', 'status', 'alamat', 'jenis_kelamin']);
            
            // Add new columns
            $table->integer('jumlah_laki_laki')->default(0);
            $table->integer('jumlah_perempuan')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('penduduk_banjar', function (Blueprint $table) {
            $table->dropColumn(['jumlah_laki_laki', 'jumlah_perempuan']);
            
            // Restore original columns
            $table->string('nama');
            $table->string('nik');
            $table->string('status');
            $table->text('alamat');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();
        });
    }
};
