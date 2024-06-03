<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailMautModel extends Model
{
    use HasFactory;

    protected $table = 'detail_maut';
    protected $primaryKey = 'detail_maut_id';
    protected $fillable = [
        'maut_id',
        'kriteria_id',
        'kriteria_skor'
    ];

    public function maut(): BelongsTo
    {
        return $this->belongsTo(MautModel::class, 'maut_id', 'maut_id');
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(KriteriaModel::class, 'kriteria_id', 'kriteria_id');
    }
}
