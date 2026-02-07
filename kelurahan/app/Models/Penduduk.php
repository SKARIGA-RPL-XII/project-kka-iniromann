<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Penduduk extends Authenticatable
{
    use Notifiable;

    protected $table = 'penduduk';
    protected $primaryKey = 'nik';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'nik', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin',
        'alamat', 'rt', 'rw', 'kelurahan', 'kecamatan', 'kabupaten', 'provinsi',
        'agama', 'status_perkawinan', 'pekerjaan', 'kewarganegaraan', 'no_kk',
        'telepon', 'email', 'password'
    ];

    protected $hidden = ['password'];

    protected $casts = [
        'tanggal_lahir' => 'date',
        'password' => 'hashed',
    ];

    public function pengajuanSurat()
    {
        return $this->hasMany(PengajuanSurat::class, 'nik', 'nik');
    }
}
