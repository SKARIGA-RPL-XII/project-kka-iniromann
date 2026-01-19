<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id',
        'surat_id',
        'nomor_pengajuan',
        'tujuan',
        'status',
        'alasan_ditolak',
        'tanggal_pengajuan',
        'tanggal_selesai',
        'file_ktp',
        'file_kk',
        'file_pengantar'
    ];

    protected $casts = [
        'tanggal_pengajuan' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function surat()
    {
        return $this->belongsTo(Surat::class);
    }
}