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
        Schema::create('guru_dan_staff', function (Blueprint $table) {
            $table->id();
            $table->string('foto')->nullable();
            $table->integer('no_urut')->nullable();
            $table->string('nama');
            $table->string('nip')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L','P'])->nullable();
            $table->string('no_karpeg')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('npwp')->nullable();
            $table->string('pangkat_golongan')->nullable();
            $table->string('sk_nomor')->nullable();
            $table->date('sk_tanggal')->nullable();
            $table->date('sk_tmt')->nullable();
            $table->decimal('angka_kredit', 10, 3)->nullable();
            $table->integer('masa_kerja_tahun')->nullable();
            $table->integer('masa_kerja_bulan')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('pendidikan_terakhir')->nullable();
            $table->date('tmt_kgb_terakhir')->nullable();
            $table->enum('sertifikasi', ['Sudah','Belum'])->nullable();
            $table->string('ket')->nullable();
            $table->date('tmt_bertugas')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guru_dan_staff');
    }
};
