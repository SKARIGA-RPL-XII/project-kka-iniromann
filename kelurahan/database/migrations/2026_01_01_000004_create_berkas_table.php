// database/migrations/2024_01_01_000004_create_berkas_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('berkas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_id')->constrained()->onDelete('cascade');
            $table->enum('jenis_berkas', [
                'ktp',
                'kk',
                'surat_pengantar_rt',
                'surat_pengantar_rw',
                'bukti_usaha',
                'lainnya'
            ]);
            $table->string('nama_file');
            $table->string('path');
            $table->string('tipe_file');
            $table->integer('ukuran_file');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('berkas');
    }
};