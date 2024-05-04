<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PendaftarBansosModel extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_bansos';
    protected $primaryKey = 'pendaftar_id';
    protected $fillable = [
        'warga_id'
    ];

    public function pendaftarBansos(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'warga_id');
    }

    public function kriteriaPenerima(): HasMany
    {
        return $this->hasMany(KriteriaPenerimaModel::class, 'pendaftar_id', 'pendaftar_id');
    }
}
