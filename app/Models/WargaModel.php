<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WargaModel extends Model
{
    use HasFactory;

    protected $table = 'warga';
    protected $primaryKey = 'warga_id';

    protected $fillable = [
        'nik',
        'kk_id',
        'status_hubungan',
        'nama_warga',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_ktp',
        'alamat_domisili',
        'agama',
        'status_perkawinan',
        'pekerjaan',
    ];

    public function kartuKeluarga(): BelongsTo
    {
        return $this->belongsTo(KKModel::class, 'kk_id', 'kk_id');
    }

    public function statusHubungan(): BelongsTo
    {
        return $this->belongsTo(StatusHubunganModel::class, 'status_hubungan', 'hubungan_id');
    }

    public function pekerjaan(): BelongsTo
    {
        return $this->belongsTo(PekerjaanModel::class, 'pekerjaan', 'pekerjaan_id');
    }

    public function ketuaRT(): HasOne
    {
        return $this->hasOne(RTModel::class, 'ketua_rt', 'warga_id');
    }

    public function pengajuSurat(): HasMany
    {
        return $this->hasMany(SuratModel::class, 'surat_pengaju', 'warga_id');
    }

    public function pendaftarBansos(): HasMany
    {
        return $this->hasMany(PendaftarBansosModel::class, 'warga_id', 'warga_id');
    }
}
