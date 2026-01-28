<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    use HasFactory;

    protected $fillable = [
        'warga_id',
        'nomor_surat',
        'jenis_surat',
        'keperluan',
        'status',
        'alasan_ditolak',
        'file_surat',
        'ttd_kepala_desa',
        'tanggal_pengajuan',
        'tanggal_selesai',
        'catatan_admin'
    ];

    protected $dates = ['tanggal_pengajuan', 'tanggal_selesai'];

    public function warga()
    {
        return $this->belongsTo(Warga::class);
    }

    public function berkas()
    {
        return $this->hasMany(Berkas::class);
    }

    // Scope untuk filter status
    public function scopeMenungguVerifikasi($query)
    {
        return $query->where('status', 'menunggu_verifikasi');
    }

    public function scopeDiproses($query)
    {
        return $query->where('status', 'diproses');
    }

    public function scopeSelesai($query)
    {
        return $query->where('status', 'selesai');
    }

    public function scopeDitolak($query)
    {
        return $query->where('status', 'ditolak');
    }
}