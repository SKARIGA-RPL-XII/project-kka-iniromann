<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $table = 'pengajuan_surat';

    protected $fillable = [
        'nomor_pengajuan', 'nik', 'jenis_surat', 'keperluan',
        'berkas_pendukung', 'status', 'catatan_admin', 'file_surat', 'tanggal_selesai'
    ];

    protected $casts = [
        'berkas_pendukung' => 'array',
        'tanggal_selesai' => 'datetime',
    ];

    public function penduduk()
    {
        return $this->belongsTo(Penduduk::class, 'nik', 'nik');
    }

    public static function generateNomorPengajuan()
    {
        $prefix = 'PGJ';
        $date = date('Ymd');
        $lastNumber = self::whereDate('created_at', today())->count() + 1;
        return $prefix . $date . str_pad($lastNumber, 3, '0', STR_PAD_LEFT);
    }
}
