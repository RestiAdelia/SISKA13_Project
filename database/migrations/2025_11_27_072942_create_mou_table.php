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
        Schema::create('mou', function (Blueprint $table) {
            $table->id();
            $table->string('judul_mou');
            $table->string('jenis_kerjasama');
            $table->string('nama_instansi');
            $table->date('tanggal_mulai');
            $table->date('tanggal_berakhir');
            $table->string('jangka_waktu')->nullable(); // atau integer (tahun)
            $table->enum('status', ['Aktif', 'Akan Berakhir', 'Tidak Aktif', 'Selesai'])->default('Aktif');
            $table->string('file')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mou');
    }
};
