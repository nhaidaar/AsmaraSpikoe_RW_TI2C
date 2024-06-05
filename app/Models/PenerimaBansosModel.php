<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerimaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'penerima_id';
    protected $fillable = [
        'warga_id',
        'bansos_id',
        'periode_bulan',
        'periode_tahun',
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'warga_id');
    }

    public function bansos(): BelongsTo
    {
        return $this->belongsTo(BansosModel::class, 'bansos_id', 'bansos_id');
    }
}
