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
        'nama_warga',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat_ktp',
        'alamat_domisili',
        'agama',
        'status_perkawinan',
        'pekerjaan',
        'status_warga'
    ];

    public function user(): HasMany
    {
        return $this->hasMany(UserModel::class, 'warga_id', 'warga_id');
    }

    public function jenisPekerjaan(): BelongsTo
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

    public function detailWarga(): HasOne
    {
        return $this->hasOne(DetailWargaModel::class, 'warga_id', 'warga_id');
    }

    public function detailKK(): HasOne
    {
        return $this->hasOne(DetailKKModel::class, 'warga_id', 'warga_id');
    }

    public function penerimaBansos(): HasOne
    {
        return $this->hasOne(PenerimaBansosModel::class, 'warga_id', 'warga_id');
    }

    public function maut(): HasOne
    {
        return $this->hasOne(MautModel::class, 'warga_id', 'warga_id');
    }
}
