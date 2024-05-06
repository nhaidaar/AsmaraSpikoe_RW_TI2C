<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class KriteriaBansosModel extends Model
{
    use HasFactory;

    protected $table = 'kriteria_bansos';
    protected $primaryKey = 'kb_id';
    protected $fillable = [
        'bansos_id',
        'bansos_kriteria'
    ];

    public function bansos(): BelongsTo
    {
        return $this->belongsTo(BansosModel::class, 'bansos_id', 'bansos_id');
    }

    public function kriteriaPenerima(): HasMany
    {
        return $this->hasMany(KriteriaPenerimaModel::class, 'kb_id', 'kb_id');
    }
}
