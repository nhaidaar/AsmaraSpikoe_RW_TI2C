<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MautModel extends Model
{
    use HasFactory;

    protected $table = 'maut';
    protected $primaryKey = 'maut_id';
    protected $fillable = [
        'warga_id',
        'skor_akhir'
    ];

    public function warga(): BelongsTo
    {
        return $this->belongsTo(WargaModel::class, 'warga_id', 'warga_id');
    }

    public function detailMaut(): HasMany
    {
        return $this->hasMany(DetailMautModel::class, 'maut_id', 'maut_id');
    }
}
