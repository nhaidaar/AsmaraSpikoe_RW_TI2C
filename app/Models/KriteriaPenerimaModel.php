<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaPenerimaModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria_penerima';
    protected $primaryKey = 'kp_id';
    protected $fillable = [
        'pendaftar_id',
        'kb_id'
    ];

    public function pendaftarBansos(): BelongsTo
    {
        return $this->belongsTo(PendaftarBansosModel::class, 'pendaftar_id', 'pendaftar_id');
    }

    public function kriteriaBansos(): BelongsTo
    {
        return $this->belongsTo(KriteriaBansosModel::class, 'kb_id', 'kb_id');
    }

    public function penerimaBansos(): HasMany
    {
        return $this->hasMany(PenerimaBansosModel::class, 'penerima_bansos', 'kp_id');
    }
}
