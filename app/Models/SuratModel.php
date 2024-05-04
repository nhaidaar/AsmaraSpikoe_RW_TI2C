<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SuratModel extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'surat';
    protected $primaryKey = 'surat_id';
    protected $fillable = [
        'surat_pengaju',
        'surat_jenis',
        'surat_tujuan',
        'surat_tanggal'
    ];

    public function pengajuSurat(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'surat_pengaju', 'warga_id');
    }
}
