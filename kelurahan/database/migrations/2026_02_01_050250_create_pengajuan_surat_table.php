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
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_pengajuan')->unique();
            $table->string('nik', 16);
            $table->enum('jenis_surat', ['SKTM', 'Domisili', 'SKU', 'Keterangan Usaha', 'Keterangan Tidak Mampu']);
            $table->text('keperluan');
            $table->json('berkas_pendukung')->nullable();
            $table->enum('status', ['Menunggu Verifikasi', 'Diproses', 'Selesai', 'Ditolak'])->default('Menunggu Verifikasi');
            $table->text('catatan_admin')->nullable();
            $table->string('file_surat')->nullable();
            $table->timestamp('tanggal_selesai')->nullable();
            $table->timestamps();
            
            $table->foreign('nik')->references('nik')->on('penduduk')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surat');
    }
};
