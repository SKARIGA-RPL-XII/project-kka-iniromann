<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $table = 'pengajuan_surat';
    
    protected $fillable = [
        'warga_id', 'jenis_surat', 'keterangan',
        'berkas_ktp', 'berkas_kk', 'surat_pengantar_rt',
        'status', 'alasan_ditolak', 'surat_hasil',
        'nomor_surat', 'catatan_admin'
    ];

    protected $casts = [
        'tanggal_verifikasi' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function getStatusTextAttribute()
    {
        $status = [
            'menunggu_verifikasi' => 'Menunggu Verifikasi',
            'diproses' => 'Diproses',
            'selesai' => 'Selesai',
            'ditolak' => 'Ditolak'
        ];
        
        return $status[$this->status] ?? $this->status;
    }
}