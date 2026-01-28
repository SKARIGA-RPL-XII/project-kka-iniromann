<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Berkas extends Model
{
    use HasFactory;

    /**
     * Nama tabel yang digunakan oleh model.
     *
     * @var string
     */
    protected $table = 'berkas';

    /**
     * Kolom yang dapat diisi (mass assignable).
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'surat_id',
        'jenis_berkas',
        'nama_file',
        'path',
        'tipe_file',
        'ukuran_file',
        'keterangan',
        'is_verified',
        'verified_at',
        'verified_by'
    ];

    /**
     * Kolom yang harus disembunyikan dari array.
     *
     * @var array<int, string>
     */
    protected $hidden = [];

    /**
     * Kolom yang harus di-cast ke tipe data tertentu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_verified' => 'boolean',
        'verified_at' => 'datetime',
        'ukuran_file' => 'integer',
    ];

    /**
     * Atribut tambahan yang ditambahkan ke array model.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'url',
        'formatted_ukuran',
        'icon_type',
        'status_label'
    ];

    /**
     * Relasi dengan model Surat.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function surat()
    {
        return $this->belongsTo(Surat::class, 'surat_id');
    }

    /**
     * Relasi dengan user yang memverifikasi.
     * 
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function verifikator()
    {
        return $this->belongsTo(User::class, 'verified_by');
    }

    /**
     * Scope untuk berkas yang sudah diverifikasi.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    /**
     * Scope untuk berkas yang belum diverifikasi.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnverified($query)
    {
        return $query->where('is_verified', false);
    }

    /**
     * Scope untuk berkas berdasarkan jenis.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string $jenis
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeJenis($query, $jenis)
    {
        return $query->where('jenis_berkas', $jenis);
    }

    /**
     * Scope untuk berkas KTP.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeKtp($query)
    {
        return $query->where('jenis_berkas', 'ktp');
    }

    /**
     * Scope untuk berkas KK.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeKk($query)
    {
        return $query->where('jenis_berkas', 'kk');
    }

    /**
     * Scope untuk berkas surat pengantar RT.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSuratPengantarRt($query)
    {
        return $query->where('jenis_berkas', 'surat_pengantar_rt');
    }

    /**
     * Scope untuk berkas surat pengantar RW.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSuratPengantarRw($query)
    {
        return $query->where('jenis_berkas', 'surat_pengantar_rw');
    }

    /**
     * Mengembalikan URL lengkap berkas.
     *
     * @return string|null
     */
    public function getUrlAttribute()
    {
        if (!$this->path) {
            return null;
        }

        return Storage::url($this->path);
    }

    /**
     * Mengembalikan path storage lengkap.
     *
     * @return string|null
     */
    public function getStoragePathAttribute()
    {
        if (!$this->path) {
            return null;
        }

        return storage_path('app/public/' . $this->path);
    }

    /**
     * Mengembalikan ukuran file yang diformat.
     *
     * @return string
     */
    public function getFormattedUkuranAttribute()
    {
        if ($this->ukuran_file >= 1073741824) {
            return number_format($this->ukuran_file / 1073741824, 2) . ' GB';
        } elseif ($this->ukuran_file >= 1048576) {
            return number_format($this->ukuran_file / 1048576, 2) . ' MB';
        } elseif ($this->ukuran_file >= 1024) {
            return number_format($this->ukuran_file / 1024, 2) . ' KB';
        } else {
            return $this->ukuran_file . ' bytes';
        }
    }

    /**
     * Mengembalikan icon berdasarkan tipe file.
     *
     * @return string
     */
    public function getIconTypeAttribute()
    {
        $extension = pathinfo($this->nama_file, PATHINFO_EXTENSION);
        
        switch (strtolower($extension)) {
            case 'pdf':
                return 'fa-file-pdf';
            case 'jpg':
            case 'jpeg':
            case 'png':
            case 'gif':
            case 'bmp':
                return 'fa-file-image';
            case 'doc':
            case 'docx':
                return 'fa-file-word';
            case 'xls':
            case 'xlsx':
                return 'fa-file-excel';
            default:
                return 'fa-file';
        }
    }

    /**
     * Mengembalikan warna berdasarkan tipe file.
     *
     * @return string
     */
    public function getIconColorAttribute()
    {
        $extension = pathinfo($this->nama_file, PATHINFO_EXTENSION);
        
        switch (strtolower($extension)) {
            case 'pdf':
                return 'text-red-500';
            case 'jpg':
            case 'jpeg':
            case 'png':
                return 'text-green-500';
            case 'doc':
            case 'docx':
                return 'text-blue-500';
            case 'xls':
            case 'xlsx':
                return 'text-green-600';
            default:
                return 'text-gray-500';
        }
    }

    /**
     * Mengembalikan label jenis berkas yang lebih mudah dibaca.
     *
     * @return string
     */
    public function getJenisLabelAttribute()
    {
        $labels = [
            'ktp' => 'Kartu Tanda Penduduk (KTP)',
            'kk' => 'Kartu Keluarga (KK)',
            'surat_pengantar_rt' => 'Surat Pengantar RT',
            'surat_pengantar_rw' => 'Surat Pengantar RW',
            'bukti_usaha' => 'Bukti Usaha',
            'akta_kelahiran' => 'Akta Kelahiran',
            'akta_kematian' => 'Akta Kematian',
            'sertifikat_tanah' => 'Sertifikat Tanah',
            'ijazah' => 'Ijazah',
            'lainnya' => 'Dokumen Lainnya'
        ];

        return $labels[$this->jenis_berkas] ?? ucfirst(str_replace('_', ' ', $this->jenis_berkas));
    }

    /**
     * Mengembalikan status verifikasi.
     *
     * @return string
     */
    public function getStatusLabelAttribute()
    {
        if ($this->is_verified) {
            return 'Terverifikasi';
        }

        return 'Belum Diverifikasi';
    }

    /**
     * Mengembalikan badge warna untuk status.
     *
     * @return string
     */
    public function getStatusBadgeAttribute()
    {
        if ($this->is_verified) {
            return 'bg-green-100 text-green-800';
        }

        return 'bg-yellow-100 text-yellow-800';
    }

    /**
     * Memeriksa apakah berkas berupa gambar.
     *
     * @return bool
     */
    public function isImage()
    {
        $imageExtensions = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp'];
        $extension = strtolower(pathinfo($this->nama_file, PATHINFO_EXTENSION));
        
        return in_array($extension, $imageExtensions);
    }

    /**
     * Memeriksa apakah berkas berupa PDF.
     *
     * @return bool
     */
    public function isPdf()
    {
        return strtolower(pathinfo($this->nama_file, PATHINFO_EXTENSION)) === 'pdf';
    }

    /**
     * Mengambil ekstensi file.
     *
     * @return string
     */
    public function getExtensionAttribute()
    {
        return strtolower(pathinfo($this->nama_file, PATHINFO_EXTENSION));
    }

    /**
     * Menghapus file fisik dari storage.
     *
     * @return bool
     */
    public function deleteFile()
    {
        if ($this->path && Storage::exists('public/' . $this->path)) {
            return Storage::delete('public/' . $this->path);
        }

        return false;
    }

    /**
     * Memverifikasi berkas.
     *
     * @param int $userId
     * @param string|null $keterangan
     * @return bool
     */
    public function verify($userId, $keterangan = null)
    {
        return $this->update([
            'is_verified' => true,
            'verified_at' => now(),
            'verified_by' => $userId,
            'keterangan' => $keterangan ?? $this->keterangan
        ]);
    }

    /**
     * Membatalkan verifikasi berkas.
     *
     * @param string|null $keterangan
     * @return bool
     */
    public function unverify($keterangan = null)
    {
        return $this->update([
            'is_verified' => false,
            'verified_at' => null,
            'verified_by' => null,
            'keterangan' => $keterangan ?? $this->keterangan
        ]);
    }

    /**
     * Hook untuk menghapus file fisik saat model dihapus.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($berkas) {
            $berkas->deleteFile();
        });
    }
}