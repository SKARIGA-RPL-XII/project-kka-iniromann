<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Warga extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'warga';

    protected $fillable = [
        'nik',
        'email',
        'password',
        'nama',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'rt',
        'rw',
        'kelurahan',
        'kecamatan',
        'kota',
        'provinsi',
        'kode_pos',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'kewarganegaraan'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'date',
    ];

    public function surats()
    {
        return $this->hasMany(Surat::class);
    }
}