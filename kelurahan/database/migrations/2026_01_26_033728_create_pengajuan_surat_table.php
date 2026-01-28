<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('pengajuan_surat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('warga_id')->constrained('warga')->onDelete('cascade');
            $table->enum('jenis_surat', ['SKTM', 'Domisili', 'SKU', 'Keterangan Usaha', 'Keterangan Tidak Mampu', 'Surat Pengantar']);
            $table->text('keterangan')->nullable();
            $table->string('berkas_ktp')->nullable();
            $table->string('berkas_kk')->nullable();
            $table->string('surat_pengantar_rt')->nullable();
            $table->enum('status', ['menunggu_verifikasi', 'diproses', 'selesai', 'ditolak'])->default('menunggu_verifikasi');
            $table->text('alasan_ditolak')->nullable();
            $table->string('surat_hasil')->nullable();
            $table->string('nomor_surat')->nullable();
            $table->date('tanggal_verifikasi')->nullable();
            $table->date('tanggal_selesai')->nullable();
            $table->text('catatan_admin')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengajuan_surat');
    }
};