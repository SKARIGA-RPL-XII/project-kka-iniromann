<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Warga extends Authenticatable
{
    use Notifiable;

    protected $table = 'warga';
    
    protected $fillable = [
        'nik', 'nama_lengkap', 'email', 'password',
        'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
        'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan',
        'kota', 'provinsi', 'agama', 'status_perkawinan',
        'pekerjaan', 'no_telepon', 'foto_ktp', 'foto_kk'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    public function pengajuanSurat()
    {
        return $this->hasMany(PengajuanSurat::class);
    }
}