// database/migrations/2024_01_01_000005_create_admin_settings_table.php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admin_settings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kelurahan');
            $table->string('alamat_kelurahan');
            $table->string('nama_kepala_desa');
            $table->string('nip_kepala_desa')->nullable();
            $table->string('ttd_digital')->nullable();
            $table->string('logo')->nullable();
            $table->string('telepon_kelurahan');
            $table->string('email_kelurahan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admin_settings');
    }
};