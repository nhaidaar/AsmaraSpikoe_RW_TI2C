<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenerimaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'penerima_bansos';
    protected $primaryKey = 'pb_id';
    protected $fillable = [
        'penerima_bansos',
        'bansos_id'
    ];

    public function penerimaBansos(): BelongsTo
    {
        return $this->belongsTo(KriteriaPenerimaModel::class, 'penerima_bansos', 'kp_id');
    }

    public function bansos(): BelongsTo
    {
        return $this->belongsTo(BansosModel::class, 'bansos_id', 'bansos_id');
    }
}
