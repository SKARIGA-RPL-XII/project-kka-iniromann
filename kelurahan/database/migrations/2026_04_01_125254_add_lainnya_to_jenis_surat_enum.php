<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE pengajuan_surat MODIFY jenis_surat ENUM('SKTM', 'Domisili', 'SKU', 'Keterangan Usaha', 'Keterangan Tidak Mampu', 'Lainnya') NOT NULL");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE pengajuan_surat MODIFY jenis_surat ENUM('SKTM', 'Domisili', 'SKU', 'Keterangan Usaha', 'Keterangan Tidak Mampu') NOT NULL");
    }
};
